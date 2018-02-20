<?php

namespace  App\Services;
use Illuminate\Http\Request;
use Auth;
use App\LeaveDay;
class LeaveDaysService
  {
      public function checkTheStartDate($request,$currentDate,$convertSecToDays)
      {

          if($currentDate == $request->startDate)
          {
              $leaveDays              =new LeaveDay();
              $leaveDays->staffId     =$request->staffId;
              $leaveDays->DaysTaken   =$convertSecToDays;
              $leaveDays->startDate   =$request->startDate;
              $leaveDays->endDate     =$request->endDate;
              $leaveDays->reasonForRequest =$request->reason;
              $leaveDays->approved         =0;
              $leaveDays->pending          =1;
              $leaveDays->created_by       =\Auth::user()->id;
              $leaveDays->save();

              return  $this->displaySuccessNotification();
          }
          else{

              $leaveDays              =new LeaveDay();
              $leaveDays->staffId     =$request->staffId;
              $leaveDays->DaysTaken   =$convertSecToDays;
              $leaveDays->startDate   =$request->startDate;
              $leaveDays->endDate     =$request->endDate;
              $leaveDays->pending     =0;
              $leaveDays->approved      =0;
              $leaveDays->reasonForRequest =$request->reason;
              $leaveDays->created_by       =\Auth::user()->id;
              $leaveDays->save();

              return  $this->displaySuccessNotification();
          }

      }

        public function displaySuccessNotification()
        {

            $notification = array(
                'message'=>'new leave form was added,please wait for approval',
                'alert-type'=>'success'
            );

            return back()->with($notification);

        }

  }