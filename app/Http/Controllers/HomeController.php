<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Auth;
use Charts;
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
        $leave   =Staff::where('onLeave',1)->get();

        foreach($leave as $item)
        {

                if ($item->departmentId == 1)
                {
                        $firstDept = Staff::where('departmentId', 1)->count();
                }
                if ($item->departmentId == 2)
                {
                    $twoDept = Staff::where('departmentId', 2)->count();
                }
        }
        if(empty($firstDept))
        {
            $firstDept = 0;
        }
        else{
            $firstDept;
        }

        if(empty($twoDept))
        {
            $twoDept = 0;
        }
        else{
            $twoDept;
        }

        $staffOnLeave = Charts::create('pie', 'highcharts')
            ->title('Staff on Leave Per Department')
            ->labels(['firstDprt', 'SecondDprt'])
            ->values([$firstDept, $twoDept])
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(true);

        //return view('home.home',compact('staffOnLeave','',''));
        return view('home.home')->with('first',json_encode($firstDept))
                                        ->with('two',json_encode($twoDept));
    }
}
