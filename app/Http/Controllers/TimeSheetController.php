<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\TimeSheet;
use Auth;




class TimeSheetController extends Controller
{
	
   public function addTimeSheet(Request $request)
   {

            $newTimeSheetRecord                      = new TimeSheet();
            $newTimeSheetRecord->timeSheetName       =$request->timeSheetName;
            $newTimeSheetRecord->jobNumber            =$request->jobNumber;
            $newTimeSheetRecord->leave                  =$request->leave;
            $newTimeSheetRecord->surfaceOfOrdinary     =$request->surfaceOfOrdinary;
            $newTimeSheetRecord->doubleOverTime     =$request->doubleOverTime;
            $newTimeSheetRecord->normalOvertime     =$request->normalOvertime;
            $newTimeSheetRecord->standBy     =$request->standBy;
            $newTimeSheetRecord->postalCode     =$request->postalCode;
            $newTimeSheetRecord->nightAllowance     =$request->nightAllowance;
            $newTimeSheetRecord->halfShift     =$request->halfShift;
            $newTimeSheetRecord->currentDate     =\Carbon\Carbon::now();
            $newTimeSheetRecord->save();

            $this->createTimeSheetFile();
            return $newTimeSheetRecord;


   }

   public function createTimeSheetFile()

   {
       //$user = User::find(Auth::user()->id);


       Excel::create('TestFile', function($excel) {
           $excel->sheet('TimeSheet',function($excel)
           {
               $excel->setTitle('Our new awesome title');
           });
       })->export('xls');



//       Excel::create('Filename', function($excel) {
//
//
//           $excel->setTitle('TimeSheet');
//           $excel->setCreator('Secretary')
//               ->setCompany('How Mine Company');
//           $excel->setDescription('Monthly TimeSheet');
//
//       });
//
////       ->download('xls');
//
//      $new =  Excel::create('New file', function($excel) {
//
//                $excel->sheet('New sheet', function($sheet) {
//
//                    $sheet->loadView('spreadSheet.timesheet');});
//
//                    });

//            }
   }
   public function viewCreateTimeSheet()
   {
       $dprtments = \App\Department::all();
       return view('timeSheets.createTimeSheet',compact('dprtments'));
   }
}
