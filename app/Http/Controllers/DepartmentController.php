<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Department;
use Illuminate\Support\Facades\Validator;
use Auth;
class DepartmentController extends Controller
{
    public function addDepartment(Request $request)
    {

         $this->validator($request->all())->validate();

            $new        = new  Department();
         	  $new->name  = $request->name;
         	  $new->save();

              $notification = array(
                  'message'=>'New department was added',
                  'alert-type'=>'success'
                          );

              return back()->with($notification);
    }

   public function getDepartment()
   {

        //$dpartments = \App\Department::query();
     $dpartments =  Department::select(array('id','name','created_at'));

        return Datatables::of($dpartments)

            ->addColumn('action', function (Department $dpartments)
            {
               
              
                if(Auth::user()->roleId == 1)
                  {
                     return '<a  class="btn btn-xs btn-primary"   data-toggle="modal"  data-target=".modalEditDepartment" onclick ="launchUpdateDepartmentModal(1);"><i class="glyphicon glyphicon-edit"></i> Edit</a>';

                  }
                  if(Auth::user()->roleId == 2){
                     return '<a  class="btn btn-xs btn-primary"   data-toggle="modal"  data-target=".modalError"><i class="glyphicon glyphicon-edit"></i> Edit</a>';


                  }
                 
            })
            ->make(true);
    
   }
   public function departmentList()
   {
    return view('departments.departmentsList');
   }
   public function details($id)
   {
      $dept    =Department::find($id);
      return $dept;
   }
   public function editDepartment(Request $request)
   {

   //return $request->all();
    $depart  =Department::find($request->deptID)
              ->update(['name'=>$request->name]);

              $notification = array(
            'message'=>'Department name updated',
            'alert-type'=>'success'
                    );

        return back()->with($notification); 

   }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'unique:departments'

        ]);

    }
}
