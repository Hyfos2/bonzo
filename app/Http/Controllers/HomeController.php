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

         $leave   = Staff::where('onLeave',0)->get();

        //return $leave;


        foreach($leave as $item)
        {

                //return $item;

                if ($item->departmentId == 1)
                {
                        $firstDept   =Staff::where('departmentId', 1)->count();

                        $accounts    =Staff::where('subDepartmentId',9)->count();
                        $stores    =Staff::where('subDepartmentId',10)->count();
                        $buyingOffice    =Staff::where('subDepartmentId',11)->count();
                        $IT    =Staff::where('subDepartmentId',12)->count();
                        $creditors    =Staff::where('subDepartmentId',13)->count();
                }
                if ($item->departmentId == 2)
                {
                    $twoDept = Staff::where('departmentId', 2)->count();

                        $clinic    =Staff::where('subDepartmentId',1)->count();
                        $communityServices    =Staff::where('subDepartmentId',2)->count();
                        $beerHall    =Staff::where('subDepartmentId',3)->count();
                        $howMineFootBall    =Staff::where('subDepartmentId',4)->count();
                        $howMineClub    =Staff::where('subDepartmentId',5)->count();
                }
                 if ($item->departmentId == 3)
                {
                    $third = Staff::where('departmentId', 3)->count();

                     $underGround    =Staff::where('subDepartmentId',14)->count();
                        $surface    =Staff::where('subDepartmentId',15)->count();
                }
                 if ($item->departmentId == 4)
                {
                    $forth = Staff::where('departmentId', 4)->count();

                        $sheq    =Staff::where('subDepartmentId',6)->count();
                        $geology    =Staff::where('subDepartmentId',7)->count();
                        $survey    =Staff::where('subDepartmentId',8)->count();
                }
                 if ($item->departmentId == 5)
                {
                    $fifth = Staff::where('departmentId', 5)->count();
                }

        }
        if(empty($firstDept))
        {
            $firstDept = 0;
            $accounts =0;
            $stores =0;
            $buyingOffice =0;
            $IT =0;
            $creditors =0;
        }
        else{
            $firstDept;
            $accounts;
            $stores;
            $buyingOffice;
            $IT;
            $creditors;
        }

        if(empty($twoDept))
        {
            $twoDept = 0;
            $clinic =0;
            $communityServices=0;
            $beerHall =0;
            $howMineFootBall =0;
            $howMineClub =0;

        }
        else{
            $twoDept;
            $clinic;
            $communityServices;
            $beerHall;
            $howMineClub;
            $howMineFootBall;
        }

         if(empty($third))
        {
            $third = 0;
            $underGround =0;
            $surface =0;

        }
        else{
            $third;
            $underGround;
            $surface;
        }
         if(empty($forth))
        {
            $forth   = 0;
            $sheq    =0;
            $geology   =0;
            $survey    =0;

        }
        else{
            $forth;
            $sheq ;
            $geology;
            $survey;
        }
         if(empty($fifth))
        {
            $fifth = 0;
        }
        else{
            $fifth;
        }

        return view('home.graphWorkingStaff')->with('first',json_encode($firstDept))
                                ->with('two',json_encode($twoDept))
                                 ->with('third',json_encode($third))
                                  ->with('forth',json_encode($forth))
                                   ->with('fifth',json_encode($fifth));
        

    }

    public function getWorkingStaffGraph()
    {
        $leave   = Staff::where('onLeave',1)->get();

        //return $leave;


        foreach($leave as $item)
        {

                //return $item;

                if ($item->departmentId == 1)
                {
                        $firstDept   =Staff::where('departmentId', 1)->count();

                        $accounts    =Staff::where('subDepartmentId',9)->count();
                        $stores    =Staff::where('subDepartmentId',10)->count();
                        $buyingOffice    =Staff::where('subDepartmentId',11)->count();
                        $IT    =Staff::where('subDepartmentId',12)->count();
                        $creditors    =Staff::where('subDepartmentId',13)->count();
                }
                if ($item->departmentId == 2)
                {
                    $twoDept = Staff::where('departmentId', 2)->count();

                        $clinic    =Staff::where('subDepartmentId',1)->count();
                        $communityServices    =Staff::where('subDepartmentId',2)->count();
                        $beerHall    =Staff::where('subDepartmentId',3)->count();
                        $howMineFootBall    =Staff::where('subDepartmentId',4)->count();
                        $howMineClub    =Staff::where('subDepartmentId',5)->count();
                }
                 if ($item->departmentId == 3)
                {
                    $third = Staff::where('departmentId', 3)->count();

                     $underGround    =Staff::where('subDepartmentId',14)->count();
                        $surface    =Staff::where('subDepartmentId',15)->count();
                }
                 if ($item->departmentId == 4)
                {
                    $forth = Staff::where('departmentId', 4)->count();

                        $sheq    =Staff::where('subDepartmentId',6)->count();
                        $geology    =Staff::where('subDepartmentId',7)->count();
                        $survey    =Staff::where('subDepartmentId',8)->count();
                }
                 if ($item->departmentId == 5)
                {
                    $fifth = Staff::where('departmentId', 5)->count();
                }

        }
        if(empty($firstDept))
        {
            $firstDept = 0;
            $accounts =0;
            $stores =0;
            $buyingOffice =0;
            $IT =0;
            $creditors =0;
        }
        else{
            $firstDept;
            $accounts;
            $stores;
            $buyingOffice;
            $IT;
            $creditors;
        }

        if(empty($twoDept))
        {
            $twoDept = 0;
            $clinic =0;
            $communityServices=0;
            $beerHall =0;
            $howMineFootBall =0;
            $howMineClub =0;

        }
        else{
            $twoDept;
            $clinic;
            $communityServices;
            $beerHall;
            $howMineClub;
            $howMineFootBall;
        }

         if(empty($third))
        {
            $third = 0;
            $underGround =0;
            $surface =0;

        }
        else{
            $third;
            $underGround;
            $surface;
        }
         if(empty($forth))
        {
            $forth   = 0;
            $sheq    =0;
            $geology   =0;
            $survey    =0;

        }
        else{
            $forth;
            $sheq ;
            $geology;
            $survey;
        }
         if(empty($fifth))
        {
            $fifth = 0;
        }
        else{
            $fifth;
        }

        return view('home.home')->with('first',json_encode($firstDept))
                                ->with('two',json_encode($twoDept))
                                 ->with('third',json_encode($third))
                                  ->with('forth',json_encode($forth))
                                   ->with('fifth',json_encode($fifth));


    }
}
