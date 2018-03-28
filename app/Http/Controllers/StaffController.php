<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Department;
use App\Grade;
use App\EmploymentType;
use App\Staff;
use App\LeaveDay;
use Auth;
use Input;
use App\User;
use App\LeaveRequestStatus;
use Carbon\Carbon;
use App\Services\LeaveDaysService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveRequest;
use App\Mail\AdminMail;
use Mockery\Exception;
use Yajra\Datatables\Datatables;

class StaffController extends Controller
{
    protected $leave;
    public function __construct(LeaveDaysService $LeaveDaysService)
    {
        $this->leave = $LeaveDaysService;
    }

    public function addStaff(Request $request)
    {

        $this->staffValidator($request->all())->validate();
        $gradesDetails = Grade::where('id', $request->grade)->first();

        try {

            $newStaff = new Staff();
            $newStaff->name = $request->name;
            $newStaff->surname = $request->surname;
            $newStaff->dob = $request->dateOfBirth;
            $newStaff->gender = $request->gender;
            $newStaff->dateOfEmployment = $request->dateOfEmployment;
            $newStaff->employmentTypeId = $request->employmentType;
            $newStaff->employeeNumber = $request->employeeNumber;
            $newStaff->departmentId = $request->department;
            $newStaff->subDepartmentId = $request->subDepartment;
            $newStaff->positionId = $request->position;
            $newStaff->gradeId = $request->grade;
            $newStaff->salary = $gradesDetails->salary;
            $newStaff->loyalty = 0;
            $newStaff->save();


            // \Flashy::message('user added');
            $notification = array(
                'message' => 'New staff member was added',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return "ok";
            }
        }

    }

    public function registerStaff()
    {
        $positions = Position::all();
        $dprtments = Department::all();
        $grades = Grade::select('grade', 'id')->orderBy('id')->get();
        $employmentTypes = EmploymentType::all();
        return view('staff.registerStaff', compact('positions', 'dprtments', 'grades', 'employmentTypes'));
    }

    public function staff()
    {
        $staff = Staff::with(['department', 'position', 'grade', 'employment'])->get();

        return Datatables::of($staff)
            ->addColumn('action', function ($staff) {
                return '<a href="getStaffDetail/' . $staff->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i>view</a>';
            })
            ->make(true);
    }

    public function addLeave(Request $request)
    {
        $currentUser  =User::find(\Auth::user()->id);

        $this->validator($request->all())->validate();

            $getDetails = Staff::where('id', $request->staffId)->first();
            $calculateOffdays = abs(strtotime($request->endDate) - strtotime($request->startDate));
            $convertSecToDays = $calculateOffdays * 1 / 86400;

            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $staffDepartment = $getDetails->departmentId;
            $user = $this->getHodDetails($staffDepartment);

            $leaveStatusId = LeaveRequestStatus::find(1)->id;

            $currentDate = Carbon::now('Africa/Harare')->format('Y-m-d');

            if ($getDetails->annualLeaveDays == 0) {
                $name = $getDetails->name;
                $surname = $getDetails->surname;
                return $this->displayNoLeaveDaysNotification($name, $surname);
            }
            if ($convertSecToDays > $getDetails->annualLeaveDays) {
                $name = $getDetails->name;
                $surname = $getDetails->surname;
                return $this->displayDangerNotification($name, $surname);
            }
            if ($request->startDate > $request->endDate) {
                $startDate = $request->startDate;
                $endDate = $request->endDate;
                return $this->endDateMustBeAfterStartDate($startDate, $endDate);
            }

            if ($request->startDate == $request->endDate) {
                $startDate = $request->startDate;
                $endDate = $request->endDate;
                return $this->startDateAndEndDateMustNotBeEqual($startDate, $endDate);

            }
    
            if ($currentDate == $request->startDate) {


                $leaveDays = new LeaveDay();
                $leaveDays->staffId = $request->staffId;
                $leaveDays->DaysTaken = $convertSecToDays;
                $leaveDays->startDate = $request->startDate;
                 $leaveDays->department = $staffDepartment;
                $leaveDays->endDate = $request->endDate;
                $leaveDays->reasonForRequest = $request->reason;
                $leaveDays->approved = 0;
                $leaveDays->pending = $leaveStatusId;
                $leaveDays->created_by = $currentUser->id;
                $leaveDays->save();


            } else {


                $leaveDays = new LeaveDay();
                $leaveDays->staffId = $request->staffId;
                $leaveDays->DaysTaken = $convertSecToDays;
                $leaveDays->startDate = $request->startDate;
                $leaveDays->endDate = $request->endDate;
                $leaveDays->pending = $leaveStatusId;
                 $leaveDays->department = $staffDepartment;
                $leaveDays->approved = 0;
                $leaveDays->reasonForRequest = $request->reason;
                $leaveDays->created_by = $currentUser->id;
                $leaveDays->save();
            }

            if (is_null($this->getHodDetails($staffDepartment))) {

                $adminDetails = User::where('roleId', 1)->select('email', 'name', 'surname')->first();
                $getDepartmentdetails = Department::find($staffDepartment);
                
                try{
                    Mail::to($adminDetails->email)->send(new AdminMail($getDepartmentdetails, $adminDetails, $leaveDays));
                    return $this->leave->displayEmailSuccessNotification();
                }
                catch (Exception $e){

                    $notification = array(
                    'message' => 'Leave Request has been created, but failed to send an email',
                    'alert-type' => 'error'
                        );
                            return back()->with($notification);

                }
                
            }

           try{
            Mail::to($this->getHodDetails($staffDepartment)->email)->send(new LeaveRequest($user, $getDetails, $leaveDays));
            return $this->leave->displaySuccessNotification();
           } 
          catch (Exception $e){

                    $notification = array(
                    'message' => 'Leave Request has been created, but failed to send an email',
                    'alert-type' => 'error'
                        );
                            return back()->with($notification);
                        }


    }

    protected function getHodDetails($staffDepartment)
    {

        if ($staffDepartment == 1) {
            $hodDetails = User::where('positionId', 2)->where('departmentId', 1)->first();

            return $hodDetails;

        } else if ($staffDepartment == 2) {
            $hodDetails = User::where('positionId', 5)->where('departmentId', 2)->first();
            return $hodDetails;
        } else if ($staffDepartment == 3) {
            $hodDetails = User::where('positionId', 4)->where('departmentId', 3)->first();
            return $hodDetails;
        } else if ($staffDepartment == 4) {
            $hodDetails = User::where('positionId', 10)->where('departmentId', 4)->first();
            return $hodDetails;
        } else {

            $hodDetails = User::where('positionId', 8)->where('departmentId', 5)->first();
            return $hodDetails;

        }
    }

    public function getStaffDetails(Request $request)
    {

        // $searchString = \Input::get('q');
        $searchString = $request->q;
        $staff = \DB::table('staff')->whereRaw(
            "CONCAT(`staff`.`name`, ' ', `staff`.`surname`) LIKE '%{$searchString}%'")
            ->select(
                array
                (
                    'staff.id as id',
                    'staff.name as name',
                    'staff.surname as surname',
                    'staff.employeeNumber as employeeNumber'
                )
            )
            ->get();
        $data = array();
        foreach ($staff as $user) {
            $data[] = array(
                "name" => "{$user->name} > {$user->surname}",
                "id" => "{$user->id}",
            );
        }

        return $data;
    }

    public function getStaff(Request $request)
    {

        // $searchString = \Input::get('q');
        $searchString = $request->q;
        $staff = \DB::table('staff')->whereRaw(
            "CONCAT(`staff`.`name`, ' ', `staff`.`surname`) LIKE '%{$searchString}%'")
            ->select(
                array
                (
                    'staff.id as id',
                    'staff.name as name',
                    'staff.surname as surname',
                    'staff.employeeNumber as employeeNumber'
                )
            )
            ->get();
        $data = array();
        foreach ($staff as $user) {
            $data[] = array(
                "name" => "{$user->name} > {$user->surname}",
                "id" => "{$user->id}",
            );
        }

        return $data;
    }

    public function displayDangerNotification($name, $surname)
    {
        $notification = array(
            'message' => 'Request days are more than the available leave days for' . " " . $name . " " . $surname,
            'alert-type' => 'error'
        );

        return back()->with($notification);

    }

    public function endDateMustBeAfterStartDate($startDate, $endDate)
    {
        $notification = array(
            'message' => 'End date' . " (" . $endDate . ") " . 'cannot be before Start date' . " (" . $startDate . ") ",
            'alert-type' => 'error'
        );


        return back()->with($notification);

    }

    public function startDateAndEndDateMustNotBeEqual($startDate, $endDate)
    {
        $notification = array(
            'message' => 'Start date' . " (" . $startDate . ") " . 'cannot be equal to End date' . " (" . $endDate . ") ",
            'alert-type' => 'error'
        );

        return back()->with($notification);

    }
     public function invalidStartDate($startDate)
    {
        $notification = array(
            'message' => 'Start date' . " (" . $startDate . ") " . 'cannot be in the past',
            'alert-type' => 'error'
        );

        return back()->with($notification);

    }

    public function displayNoLeaveDaysNotification($name, $surname)
    {
        $notification = array(
            'message' => $name . " " . $surname . " " . "have no Leave Days available",
            'alert-type' => 'error'
        );

        return back()->with($notification);

    }

    public function getStaffDetail($id)
    {
        $getDetails = Staff::with(['department', 'position', 'grade', 'employment', 'category'])->find($id);
        $staffLeaveRecords = LeaveDay::with('staff')->where('staffId', $id)->get();
        //return $getDetails;

        return view('staff.getStaffDetails', compact('getDetails', 'staffLeaveRecords'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'staffId' => 'required |numeric',
            'startDate' => 'required |date',
            'endDate' => 'required |date',
            'reason' => 'required ',

        ]);

    }

    protected function staffValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required ',
            'surname' => 'required ',
            'employeeNumber' => 'required |alpha_num',
            'dateOfBirth' => 'required ',
            'dateOfEmployment' => 'required ',
            'employmentType' => 'required ',
            'position' => 'required ',
            'department' => 'required ',
            'subDepartment' => 'required ',
            'gender' => 'required ',
            'grade' => 'required '

        ]);

    }

    public function staffGrades()
    {
        return view('staff.staffGrades');
    }
    public function  companyStaff()
    {
        return view('staff.staffList');
    }


}
