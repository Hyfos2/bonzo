<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Grade;
use App\Position;
use App\User;
use App\Role;
use Auth;
use App\Department;

class AppServiceProvider extends ServiceProvider
{
   
    public function boot()
    {


        if (\Schema::hasTable('grades'))
        {
            $grades          = Grade::orderBy('id','ASC')->get();
            $selectGrades    = array();
//            $selectGrades[0] = "Select Grade";

            foreach ($grades as $grade)
             {
               $selectGrades[$grade->id] = $grade->grade;
             }

             \View::share('selectGrades',$selectGrades);

        }

        if (\Schema::hasTable('positions'))
        {
            $positions          = Position::orderBy('name','ASC')
                                                 ->get();
            $selectPositions    = array();
//            $selectPositions[0] = "Select Position";

            foreach ($positions as $position)
             {
               $selectPositions[$position->id] = $position->name;
             }

             \View::share('selectPositions',$selectPositions);

        }
        if (\Schema::hasTable('departments'))
        {
            $depts          = Department::orderBy('name','ASC')->get();
            $selectDept    = array();
    //            $selectDept[0]   = "Select Department";

            foreach ($depts as $dprt)
            {
                $selectDept[$dprt->id] = $dprt->name;
            }

            \View::share('selectDept',$selectDept);

        }
         if (\Schema::hasTable('roles'))
        {
            $roles          = Role::orderBy('name','ASC')->get();
            $selectRole    = array();
    //            $selectDept[0]   = "Select Department";

            foreach ($roles as $role)
            {
                $selectRole[$role->id] = $role->name;
            }

            \View::share('selectRole',$selectRole);

        }



      Schema::defaultStringLength(191);
    }

    
    public function register()
    {
         
    }
}
