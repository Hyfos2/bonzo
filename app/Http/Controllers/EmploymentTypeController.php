<?php

namespace App\Http\Controllers;

use App\EmploymentType;
use Illuminate\Http\Request;

class EmploymentTypeController extends Controller
{
    public  function index()
    {
        return view('home.typeList');
    }
    public function add(Request $request)
    {
        $newType = EmploymentType::create($request->all());
        return $newType;
    }

    public function getTypes()
    {
        return "okay";
    }
}
