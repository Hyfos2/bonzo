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
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use Yajra\Datatables\Datatables;

class StaffController extends Controller
{
    
    public function addStaff(Request $request)
    {
        $this->staffValidator($request->all())->validate();

        $gradesDetails    =Grade::where('id',$request->grade)->first();


        $newStaff  = new Staff();
        $newStaff->name  =$request->name;
        $newStaff->surname   =$request->surname;
        $newStaff->dob =$request->dateOfBirth;
        $newStaff->gender  =$request->gender;
        $newStaff->dateOfEmployment =$request->dateOfEmployment;
        $newStaff->employmentTypeId = $request->employmentType;
        $newStaff->employeeNumber =$request->employeeNumber;
        $newStaff->departmentId =$request->department;
        $newStaff->positionId=$request->position;
        $newStaff->gradeId  =$request->grade;

        $newStaff->salary=$gradesDetails->salary;
        $newStaff->loyalty = 0;
        $newStaff->save();
        

        $notification = array(
            'message'=>'new staff member was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
    	
    }

    public function registerStaff()
    {
    	$positions  =Position::all();
    	$dprtments  =Department::all();
    	$grades		=Grade::all();
    	$employmentTypes =EmploymentType::all();
    	return view('staff.registerStaff', compact('positions','dprtments','grades','employmentTypes'));
    }
    public function staff()
    {
        $staff = Staff::with(['department','position','grade','employment'])->get();

		return Datatables::of($staff)
            ->addColumn('action', function ($staff) {
                return '<a href="getStaffDetail/'.$staff->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }
    public function addLeave(Request $request)
   {

       $this->validator($request->all())->validate();


       //to plan again.

      return   $request->all();

     $getDetails           =Staff::where('id',$request->staffId)->first();  
     $calculateOffdays     = abs(strtotime($request->endDate) - strtotime($request->startDate)
                                                                                                    );
            $convertSecToDays    =$calculateOffdays *1/86400;

            if($convertSecToDays > $getDetails->annualLeaveDays)
            {
                $name=$getDetails->name;
                $surname=$getDetails->surname;
            return  $this->displayDangerNotification($name,$surname);
            }

            $remaininAnnualDays   =$getDetails->annualLeaveDays - $convertSecToDays;

            $currentDate  =Carbon::now()->format('Y-m-d');
            if($currentDate != $request->startDate)

            {

            $leaveDays              =new LeaveDay();
            $leaveDays->staffId     =$request->staffId;
            $leaveDays->DaysTaken   =$convertSecToDays;
            $leaveDays->startDate   =$request->startDate;
            $leaveDays->endDate     =$request->endDate;
            $leaveDays->reason     =$request->reason;
//            $leaveDays->created_by  =Auth::user()->id;
            $leaveDays->save();

            
            return  $this->displaySuccessNotification();

            }

            $updateStaff =Staff::where('id',$request->staffId)
             ->update([ 'onLeave'=>1 ,
                          'annualLeaveDays'=>$remaininAnnualDays
                                                         ]);

            $leaveDays              =new LeaveDay();
            $leaveDays->staffId     =$request->staffId;
            $leaveDays->DaysTaken   =$convertSecToDays;
            $leaveDays->startDate   =$request->startDate;
            $leaveDays->endDate     =$request->endDate;
            $leaveDays->reason     =$request->reason;
            $leaveDays->created_by  =Auth::user()->id;
            $leaveDays->save();

        return    $this->displaySuccessNotification();
    
          
   }
   public function getStaffDetails(Request $request)
   {

    // $searchString = \Input::get('q');
       $searchString = $request->q;
        $staff        = \DB::table('staff') ->whereRaw(
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
                "id"   => "{$user->id}",
            );
        }

        return $data;
   }
   public function getStaff(Request $request)
    {

        // $searchString = \Input::get('q');
        $searchString = $request->q;
        $staff        = \DB::table('staff') ->whereRaw(
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
                "id"   => "{$user->id}",
            );
        }

        return $data;
    }
    public function displaySuccessNotification()
   {

      $notification = array(
            'message'=>'new leave form was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);

   }
   public function displayDangerNotification($name,$surname)
   {
     $notification = array(
            'message'=>'Request days are more than the available leave days for'." ".$name." ".$surname,
            'alert-type'=>'error'
                    );

                return back()->with($notification);

   }
   public function getStaffDetail($id)
   {
       $getDetails   =Staff::with(['department','position','grade','employment'])->find($id);
       $staffLeaveRecords  =LeaveDay::with('staff')->where('staffId',$id)->get();

       return view('staff.getStaffDetails',compact('getDetails','staffLeaveRecords'));
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
            'employeeNumber' => 'required ',
            'dateOfBirth' => 'required ',
            'dateOfEmployment' => 'required ',
            'employmentType' => 'required ',
            'position' => 'required ' ,
            'department' => 'required ',
            'gender' => 'required ',
            'grade' => 'required '

        ]);

    }

}
