<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\LeaveDay;

class LeaveController extends Controller
{
    public function getLeavedays()
    {
        $leaveDays = LeaveDay::with('staff')
            ->get();

        return Datatables::of($leaveDays)
            ->addColumn('action', function ($leaveDays) {
                return '<a href="#edit-'.$leaveDays->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    

	
}
