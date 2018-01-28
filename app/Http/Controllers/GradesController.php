<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Yajra\Datatables\Facades\Datatables;
class GradesController extends Controller
{
   public  function addGrade(Request $request)
   {
   	
       $newGrade     = Grade::create($request->all());
       return $newGrade;
       return $request->all();
   }

   public function getGrades()
   {
   	$grades = \DB::table('grades')
            ->get();

		return \Datatables::of($grades)
			->addColumn('actions', '<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>
                                        '
			)->make(true);

   }
}
