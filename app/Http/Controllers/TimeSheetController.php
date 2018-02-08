<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Auth;




class TimeSheetController extends Controller
{
	
   public function addTimeSheet(Request $request)
   {
   			return $request->all();
   }

   public function index()
   {
       $user = User::find(Auth::user()->id);

      $new =  Excel::create('New file', function($excel) {

                $excel->sheet('New sheet', function($sheet) {

                    $sheet->loadView('spreadSheet.timesheet');

                                     });

                    });

   }

   public function viewCreateTimeSheet()
   {
       $dprtments = \App\Department::all();
       return view('timeSheets.createTimeSheet',compact('dprtments'));
   }
}
