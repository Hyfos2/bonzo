<?php

namespace App\Http\Middleware;

use Closure;

class accessLevel 
{
    
    public function handle($request, Closure $next)
    {

        if($request->positionId  == 1)
        {
            return redirect('admin');
        }
        elseif ($request->positionId  == 2)
         {
            return redirect('welcome');
         }
       else{
        return "unknwon credentials";
       }
        return $next($request);
    }
}
