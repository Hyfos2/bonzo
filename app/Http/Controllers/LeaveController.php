<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\LeaveDay;
use App\Staff;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\requestAcceptance;

class LeaveController extends Controller
{
    public function getLeavedays()
    {
        $leaveDays =LeaveDay::with('staff')->where('pending',0)->where('approved',0)
            ->get();

        return Datatables::of($leaveDays)
            ->addColumn('action', function ($leaveDays) {
                return '<a href="#edit-'.$leaveDays->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    public function getRequests()
    {
        // return Cache::remember(function(){

        // })

        $requests = LeaveDay::with('staff','user')->where('pending',0)->where('approved',0)->get();
         return Datatables::of($requests)
            ->addColumn('action', function ($requests) {
                return '<a href="requestProfile/'.$requests->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i>View</a>';
            })
            ->make(true);


    }

    public function getStaffNotWorking()
    {
         $leaveDays =LeaveDay::with('staff')->where('pending',1)->where('approved',1)
            ->get();

        return Datatables::of($leaveDays)
            ->addColumn('action', function ($leaveDays) {
                return '<a href="leaveProfile/'.$leaveDays->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i>View</a>';
            })
            ->make(true);

    }
    public function staffOnLeave()
    {
        return view('hod.staffOnLeave');
    }

    public function requestListing()
    {
        return view('hod.index');
    }

    public function requestProfile($id)
    {

        $leaveRequestProfile   =LeaveDay::with('staff','user')->find($id);
        $staffLeaveRecords     =LeaveDay::where('id',$id)->where('approved',1)->get(['startDate','endDate','daysTaken']);

        // return $staffLeaveRecords;

        return view('hod.profile',compact('leaveRequestProfile','staffLeaveRecords'));

    }

    public function acceptRequest($id)
    {

                 $updateTheRecord    =LeaveDay::with('user','staff')->find($id);

                    
                    if($updateTheRecord->approved ==1 || $updateTheRecord->approved ==2)
                    {
                        return "updated";
                    }

                $latestChanges      =$updateTheRecord->update(['approved'=>1,
                                                                'pending'=>1,
                                                             'approvedBy'=>Auth::user()->id]);





    $remainingDays   = $updateTheRecord->staff->annualLeaveDays - $updateTheRecord->daysTaken;


    $staffTable   =Staff::find($updateTheRecord->staffId)
                                         ->update(['annualLeaveDays'=>$remainingDays]);

            $HodDetails =User::find(Auth::user()->id);



            \Mail::to($updateTheRecord->user->email)->send(new requestAcceptance($updateTheRecord,$HodDetails));
        return "updated successfully";
    }

    public function rejectReason(Request $request,$id)
    {

         $updateTheRecord    =LeaveDay::with('user','staff')->find($id);
         $latestChanges      =$updateTheRecord->update(['approved'=>1,
                                                        'pending'=>2,
                                                        'approvedBy'=>Auth::user()->id,
                                                        'rejectionReason'=>$request->rejectReason]);


        $HodDetails        = User::find(Auth::user()->id);

        \Mail::to($updateTheRecord->user->email)->send(new requestAcceptance($updateTheRecord,$HodDetails));
        return "saved";

    }

    

	
}
