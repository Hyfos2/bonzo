<?php

namespace App\Http\Controllers;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Positions;


class PositionsController extends Controller
{


    protected function create(Request $request)
    {
    	// $position         = new Position();
    	// $position->name   = $request['name'];
    	// $position->save();

    	$position  =Position::create($request->all());

    	return $position;

    }
}
