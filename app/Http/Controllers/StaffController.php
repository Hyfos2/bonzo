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
use Yajra\Datatables\Facades\Datatables;

class StaffController extends Controller
{
    
    public function addStaff(Request $request)
    {
    	return $request->all();
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
    	$staff = \DB::table('staff')
			->leftJoin('positions', 'staff.positionId', '=', 'positions.id')
            ->leftJoin('grades', 'staff.gradeId', '=', 'grades.id')
            ->leftJoin('departments', 'staff.departmentId', '=', 'departments.id')
            ->leftJoin('employment_types', 'staff.employmentTypeId', '=', 'employment_types.id')
            ->get();

		return \Datatables::of($staff)
			->addColumn('actions', '<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>


                                        '
			)->make(true);
    }
   

   public function addLeave(Request $request)
   {

            $leaveDays              =new LeaveDay();
            $leaveDays->staffId     =$request->staffId;
            $leaveDays->offDays     =$request->offDays;
            $leaveDays->approvedBy  =Auth::user()->id;
            $leaveDays->startDate   =$request->startDate;
            $leaveDays->endDate     =$request->endDate;
            $leaveDays->save();



     return $leaveDays;
   }
}
