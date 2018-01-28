<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function addDepartment(Request $request)
    {
        return $request->all();
    }
}
