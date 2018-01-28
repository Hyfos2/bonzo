<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;

class LoginController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    public function login(Request $request)
    {

        $this->validateLogin($request);

    	if(Auth::attempt([
    		'email'=>$request->email,
    		'password'=>$request->password
    		]) )

    		{
    			
    		  return Redirect::to('/welcome');

    		}

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        // $notification = array(
        //     'message'=>'Wrong credentials!!',
        //     'alert-type'=>'danger'); 

        //     return Redirect()->back()->with($notification);

        return $this->sendFailedLoginResponse($request);

    		//return Redirect()->back();
    }

    public function lastLogin()
    {
        $lastLogin = User::select('name','surname','lastLogin','regionId','departmentId')->get();
        return Datatables::of($lastLogin)->make(true);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);


          // $notification = array(
          //   'message'=>'Wrong credentials!!',
          //   'alert-type'=>'danger'); 

            // return back()->with($notification);
    }

    public function username()
    {
        return 'email';
    }
     protected function guard()
    {
        return Auth::guard();
    }

}

