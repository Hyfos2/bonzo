<?php

namespace App\Http\Controllers;
use App\Position;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Auth;

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
                     if(Auth::user()->roleId == 1)
                  {
                  return '<a  class="btn btn-xs btn-primary"   data-toggle="modal"  data-target=".modalEditPosition" onclick ="launchUpdatePositionModal(1);"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
              }
              if(Auth::user()->roleId == 2)
              {
                   return '<a  class="btn btn-xs btn-primary"   data-toggle="modal"  data-target=".modalError"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
              }
            })
            ->make(true);
    }

    public function getPositionsList()
     {
        return view('positions.positionsList');
      }
    public function positionDetails($id)
    {
                 $position =Position::find($id);
                 return $position;
    }
}
