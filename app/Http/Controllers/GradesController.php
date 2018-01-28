<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Yajra\Datatables\Datatables;

class GradesController extends Controller
{
   public  function addGrade(Request $request)
   {
   	
       $newGrade     = Grade::create($request->all());
       return $newGrade;
   }

   public function getGrades()
   {
   	$grades = \DB::table('grades')
            ->get();

		return Datatables::of($grades)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);

   }
}
//->addColumn('actions', '<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>
