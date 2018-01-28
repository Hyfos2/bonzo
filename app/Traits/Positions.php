<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Positions
{

	 public function create(Request $request)
    {

	$this->validator($request->all())->validate();
	$this->create($request->all());
	return "a position";
    }

}