<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('master');
    }

    public function welcome()
    {

    	$userId        =\Auth::user()->id;
    	$userPositionName   = User::find($userId)->position->name;

    	return view('master');
    }
}
