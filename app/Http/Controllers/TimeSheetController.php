<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Staff;
use App\Department;
use App\TimeSheet;
use Auth;
use Illuminate\Support\Facades\Validator;

class TimeSheetController extends Controller
{

    public  $currentMonth;
    public   $currentYr ;




    public function addTimeSheet(Request $request)
   {

       $formData  = $request->all(['Dates','jobNumber','leave','surfaceOfOrdinary','doubleOverTime','normalOvertime','standBy','nightAllowance','halfShift']);

          $this->validateInput($request->all())->validate();
        
            $newTimeSheetRecord                      = new TimeSheet();
            $newTimeSheetRecord->staffName       =$request->staffName;
            $newTimeSheetRecord->jobNumber           =$request->jobNumber;
            $newTimeSheetRecord->leave               =$request->leave;
            $newTimeSheetRecord->surfaceOfOrdinary   =$request->surfaceOfOrdinary;
            $newTimeSheetRecord->doubleOverTime     =$request->doubleOverTime;
            $newTimeSheetRecord->normalOvertime     =$request->normalOvertime;
            $newTimeSheetRecord->standBy            =$request->standBy;
            $newTimeSheetRecord->postalCode          =0;
            $newTimeSheetRecord->nightAllowance     =$request->nightAllowance;
            $newTimeSheetRecord->halfShift     =$request->halfShift;
            $newTimeSheetRecord->currentDate      =\Carbon\Carbon::now();
            $newTimeSheetRecord->save();

        return  $this->createTimeSheetFile($request->staffName,$formData);


   }

   public function createTimeSheetFile($userId,$data)
   {

       $month =Date('m');
       $year  =Date('Y');

       $staff             =Staff::with('position')->find($userId);
       $user              =User::with('position')->find(Auth::user()->id);
       $totalMonthDays    =$this->getTheTotalNumberPerCurrentMonth($month,$year)+1;

         $getDepartmentName   = Department::find($data['jobNumber']);

        if(array_search($data['jobNumber'],$data))
        {
          $data['jobNumber'] = $getDepartmentName->name;
          array_pad($data,-1,$data['jobNumber']);

        }
      

         $dataValues     = array_keys($data);
        $cellValues     = array_values($data);

        $dayPosition  =$this->positionOfToday()+1;
        $currentDy    =$this->now();

        $cMonthDates  =$this->currentMonthDates();


  Excel::create($staff->name." ".$staff->surname."(".$staff->position->name.")", function($excel) use($staff,$user,$dataValues,$cellValues,$dayPosition,$currentDy, $totalMonthDays ,$cMonthDates) {

  $excel->sheet('TimeSheet',function($excel) use($staff,$user,$dataValues,$cellValues,$dayPosition,$currentDy, $totalMonthDays,$cMonthDates )
           {
               $excel->fromArray($dataValues);
               $excel->row($dayPosition,$cellValues);

               for($i =2;$i<= $totalMonthDays ;$i++)
               {
                  

                $excel->cell('A'.$i,function($cell) use($currentDy,$cMonthDates,$i,$totalMonthDays)
               {

               
                      if($i==2)
                          $cell->setValue($cMonthDates[0]);
                        if($i==3)
                          $cell->setValue($cMonthDates[1]) ;
                        if($i==4)
                          $cell->setValue($cMonthDates[2]) ;
                        if($i==5)
                          $cell->setValue($cMonthDates[3]) ;
                        if($i==6)
                          $cell->setValue($cMonthDates[4]) ;
                        if($i==7)
                          $cell->setValue($cMonthDates[5]) ;
                        if($i==8)
                          $cell->setValue($cMonthDates[6]) ;
                        if($i==9)
                          $cell->setValue($cMonthDates[7]) ;
                        if($i==10)
                          $cell->setValue($cMonthDates[8]) ;
                        if($i==11)
                          $cell->setValue($cMonthDates[9]) ;
                        if($i==12)
                          $cell->setValue($cMonthDates[10]) ;
                        if($i==13)
                          $cell->setValue($cMonthDates[11]) ;
                        if($i==14)
                          $cell->setValue($cMonthDates[12]) ;
                        if($i==15)
                          $cell->setValue($cMonthDates[13]) ;
                        if($i==16)
                          $cell->setValue($cMonthDates[14]) ;
                        if($i==17)
                          $cell->setValue($cMonthDates[15]) ;
                        if($i==18)
                          $cell->setValue($cMonthDates[16]) ;
                        if($i==19)
                          $cell->setValue($cMonthDates[17]) ;
                        if($i==20)
                          $cell->setValue($cMonthDates[18]) ;
                        if($i==21)
                          $cell->setValue($cMonthDates[19]) ;
                        if($i==22)
                          $cell->setValue($cMonthDates[20]) ;
                        if($i==23)
                          $cell->setValue($cMonthDates[21]) ;
                        if($i==24)
                          $cell->setValue($cMonthDates[22]) ;
                        if($i==25)
                          $cell->setValue($cMonthDates[23]) ;
                        if($i==26)
                          $cell->setValue($cMonthDates[24]) ;
                        if($i==27)
                          $cell->setValue($cMonthDates[25]) ;

                        if($i==28)
                          $cell->setValue($cMonthDates[26]) ;
                        if($i==29)
                          $cell->setValue($cMonthDates[27]) ;

                        if($i==30)
                        $cell->setValue($cMonthDates[28]) ;
                        if($i==31)
                          $cell->setValue($cMonthDates[29]) ;
                        if($i==32)
                          $cell->setValue($cMonthDates[30]) ;
                        if($i==33)
                          $cell->setValue($cMonthDates[31]) ;
                  });
               }
               $excel->setTitle("How Mine - Grade"." ".$staff->gradeId."  "."Time Sheet");
           });
       })->download('xlsx');

return $this->goBack();

   }
   public function viewCreateTimeSheet()
   {
       $dprtments = \App\Department::all();
       return view('timeSheets.createTimeSheet',compact('dprtments'));
   }

   public function getTheTotalNumberPerCurrentMonth($month,$year)
   {
        $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $number; 
   }

    public function positionOfToday()
    {

        $dateOnly  =substr($this->now(),0,-6);
        foreach($this->currentMonthDates() as $dayVal)
        {
            if($dayVal ==$this->now()){
                return $dateOnly;
            }
        }

    }

    public function now()
    {
        $today   =\Carbon\Carbon::now('Africa/Johannesburg');
        $day_num = Date('d',strtotime($today));
        $day_name = Date ('m',strtotime($today ));
        $year = Date ('y', strtotime($today));

       return  $currentDate = $day_num.".".$day_name.".".$year;
    }

   public function currentMonthDates()
   {

              $currentMonth =Date('m');
              $currentYr =Date('Y');
              $DAYS                     =$this->getTheTotalNumberPerCurrentMonth($currentMonth,$currentYr);
              $firstDayOfCurrentMonth   =Date('01-m-Y');
              $end                      =Date($DAYS.'-m-Y'); 

              $datesArray    =[];

              while(strtotime($firstDayOfCurrentMonth) <=strtotime($end))
              {
                   $day_num = Date('d', strtotime($firstDayOfCurrentMonth ));
                   $day_name = Date ('m', strtotime($firstDayOfCurrentMonth ));
                   $year = Date ('y', strtotime($firstDayOfCurrentMonth ));
                   $firstDayOfCurrentMonth  = Date ("d-m-Y", strtotime("+1 day", strtotime($firstDayOfCurrentMonth)));

                  $date  = $day_num.".".$day_name.".".$year;

                  array_push($datesArray,$date);
                }

              return $datesArray;

   }
   public function goBack()
   {
     $notification = array(
            'message'=>'check a spread sheet in the downloads section',
            'alert-type'=>'success'
                    );
      return redirect()::to('createTimeSheet')->with($notification);



   }

        protected function validateInput(array $data)
    {
        return Validator::make($data, [
            
          'staffName' => 'required|unique:time_sheets',
            'jobNumber' => 'required ',
            'leave' => 'required ',
            'surfaceOfOrdinary' => 'required|numeric|integer|min:-1 |max:8',
            'doubleOverTime' => 'required|numeric|integer|min:-1 ',
            'normalOvertime' => 'required|numeric|integer|min:-1',
            'standBy' => 'required|numeric|integer|min:-1',
            'nightAllowance' => 'required|numeric|integer|min:-1',
            'halfShift' => 'required|numeric|integer|min:-1'
        ]);

    }

  public function timeSheets()
    {
      return view('timeSheets.timeSheets');
    }
   
}
