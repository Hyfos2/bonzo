<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftHour;
use Yajra\Datatables\Datatables;

class ShiftController extends Controller
{
   
   public function  workingHours()
   {

   	 return view('home.workingStaff');

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

   	  return $newShift;
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
}
