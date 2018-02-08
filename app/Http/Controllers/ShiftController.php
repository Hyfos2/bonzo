<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftHour;
use App\workingStaff;
use Yajra\Datatables\Datatables;

class ShiftController extends Controller
{
   
   public function  workingHours()
   {

   	 return view('home.workingStaff');
   	 }

   	 public function workingTeam()
     {
         return view('home.workingTeam');
     }
   public function addShift(Request $request)
   {

         $calcWorkingHours      = strtotime($request->timeOut)-strtotime($request->timeIn);
         $convertIntoHours       =  $calcWorkingHours/3600;

         $newShift                =new ShiftHour();
         $newShift->name          =$request->name; 
         $newShift->timeIn        =$request->timeIn; 
         $newShift->timeOut       =$request->timeOut; 
         $newShift->workingHours  =$convertIntoHours; 
          $newShift->created_by    =\Auth::user()->id; 
         $newShift->save();

   	    return $this->successNotification();
   }
   public function allocateShifts()
   {
   		 return view('home.allocateShifts');
   }
   
   public function getShifts()
   {

      $shifts = \DB::table('shift_hours')
            ->get();

        return Datatables::of($shifts)
            ->addColumn('action', function ($shifts) {
                return '<a href="#edit-'.$shifts->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
         

   }
   public function getShiftTeam()
   {

       $teamOnshifts = WorkingStaff::with(['staff','hour'])->get();

       return Datatables::of($teamOnshifts)
           ->addColumn('action', function ($teamOnshifts) {
               return '<a href="#edit-'.$teamOnshifts->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
           })
           ->make(true);

   }

   public function getShiftDetails(Request $request)
   {
       // $searchString = \Input::get('q');
       $searchString = $request->q;
        $shifts        = \DB::table('shift_hours') ->whereRaw(
                "CONCAT(`shift_hours`.`name`) LIKE '%{$searchString}%'")
            ->select(
                array
                (
                    'shift_hours.id as id',
                    'shift_hours.name as name',
                    'shift_hours.timeOut as timeOut',
                    'shift_hours.timeIN as timeIN'
                )
            )
            ->get();
        $data = array();
        foreach ($shifts as $shift) {
            $data[] = array(
                "name" => "{$shift->name}",
                "id"   => "{$shift->id}",
            );
        }

        return $data;
   }

   public function allocate(Request $request)
   {
            $new   = WorkingStaff::create($request->all());

            return $this->successNotification();
        
   }

   public function successNotification()
   {
      $notification = array(
            'message'=>'A record was saved',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
   }


}
