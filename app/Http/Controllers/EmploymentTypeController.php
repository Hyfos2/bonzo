<?php

namespace App\Http\Controllers;

use App\EmploymentType;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class EmploymentTypeController extends Controller
{
    public  function index()
    {
        return view('home.typeList');
    }
    public function add(Request $request)
    {
        $newType = EmploymentType::create($request->all());
        $notification = array(
            'message'=>'new employment type was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
    }

    public function getTypes()
    {

        $types = \DB::table('employment_types')
            ->get();

        return Datatables::of($types)
            ->addColumn('action', function ($types) {
                 return '<a  class="btn btn-xs btn-primary"  data-toggle="modal"  data-target=".modalEditType" onclick ="launchUpdateType(1);"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
     
            })
            ->make(true);
    }
}
