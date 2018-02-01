<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LeaveController extends Controller
{
    public function getLeavedays()
    {
        $leaveDays = \DB::table('staff')
            ->where('onLeave',1)
            ->get();

        return Datatables::of($leaveDays)
            ->addColumn('action', function ($leaveDays) {
                return '<a href="#edit-'.$leaveDays->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    

	
}
