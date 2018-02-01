<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Department;

class DepartmentController extends Controller
{
    public function addDepartment(Request $request)
    {
        $new        = new  Department();
   	 $new->name  = $request->name;
   	 $new->save();

        $notification = array(
            'message'=>'new department was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
    }

   public function getDepartment()
   {

        $dpartments = \DB::table('departments')
            ->get();

        return Datatables::of($dpartments)
            ->addColumn('action', function ($dpartments) {
                return '<a href="#edit-'.$dpartments->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    
   }
}
