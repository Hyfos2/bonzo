<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Auth;
class GradesController extends Controller
{
   public  function addGrade(Request $request)
   {

       $this->validator($request->all())->validate();

        $newGrade     = Grade::create($request->all());
       
        $notification = array(
            'message'=>'new grade was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
   }

   public function getGrades()
   {
   	$grades = \DB::table('grades')
                ->get();

		return Datatables::of($grades)
            ->addColumn('action', function ($grades) 
            {
                //return '<a href="#edit-'.$grades->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>';
                     if(Auth::user()->roleId == 1)
              {return '<a  class="btn btn-xs btn-primary"  data-toggle="modal"  data-target=".modalEditGrade" onclick ="launchUpdateGradeModal(1);"><i class="glyphicon glyphicon-edit"></i> Edit</a>';}

                       if(Auth::user()->roleId == 2)
              {
                   return '<a  class="btn btn-xs btn-primary"   data-toggle="modal"  data-target=".modalError"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
              }
            })

            ->make(true);

   }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'grade' => 'unique:grades'
        ]);

    }

    public function gradeDetails($id)
    {
      
      $grade   = Grade::find($id);
      return $grade;

    }

    public function editGrade(Request $request)
    {
        
        $grade   = Grade::find($request->gradeID)
                          ->update(['salary'=>$request->salary,
                                  'grade'=>$request->grade]);


          $notification = array(
            'message'=>'Grade was updated',
            'alert-type'=>'success');

        return back()->with($notification);
    }
}


