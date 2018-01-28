<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Grade;
use App\Position;
use App\User;
use Auth;

class AppServiceProvider extends ServiceProvider
{
   
    public function boot()
    {


        if (\Schema::hasTable('grades'))
        {
            $grades          = Grade::orderBy('name','ASC')
                                                 ->get();
            $selectGrades    = array();
            $selectGrades[0] = "Select Grade";

            foreach ($grades as $grade)
             {
               $selectGrades[$grade->id] = $grade->name;
             }

             \View::share('selectGrades',$selectGrades);

        }

        if (\Schema::hasTable('positions'))
        {
            $positions          = Position::orderBy('name','ASC')
                                                 ->get();
            $selectPositions    = array();
            $selectPositions[0] = "Select Position";

            foreach ($positions as $position)
             {
               $selectPositions[$position->id] = $position->name;
             }

             \View::share('selectPositions',$selectPositions);

        }



      Schema::defaultStringLength(191);
    }

    
    public function register()
    {
         
    }
}
