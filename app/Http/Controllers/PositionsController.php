<?php

namespace App\Http\Controllers;
use App\Position;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;


class PositionsController extends Controller
{


    protected function create(Request $request)
    {
    	
    $position  =Position::create($request->all());
  	 $notification = array(
            'message'=>'new position was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);

    }

    public function getPositions()
    {

        $positions = \DB::table('positions')
            ->get();

        return Datatables::of($positions)
            ->addColumn('action', function ($positions) {
                return '<a href="#edit-'.$positions->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    public function getPositionsList()
     {
        return view('positions.positionsList');
    }
}

