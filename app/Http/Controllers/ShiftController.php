<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftController extends Controller
{
   
   public function  workingHours()
   {

   	 return view('home.workingStaff');

   }

   public function addShift(Request $request)
   {
   	  return $request->all();
   }
   public function allocateShifts()
   {
   		 return view('home.allocateShifts');
   }

   public function allocate(Request $request)
   {

   		return $request->all();

   }
}
