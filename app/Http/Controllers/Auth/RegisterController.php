<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
   
    use RegistersUsers;
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users'
        ]);

    }

    protected function create(array $data)
    {

        $generateUserPassword   = $this->generateRandomString();
             return User::create([ 
            'email' => $data['email'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'positionId' => $data['positionId'],
             'departmentId' => $data['departmentId'],
            'subDepartmentId' => $data['subDepartmentId'],
            'gradeId' => $data['gradeId'],
            'roleId' => $data['roleId'],
            'userName' => $generateUserPassword,
            'password' => bcrypt($generateUserPassword)
        ]);
        
        
       

    }

    public function generateRandomString()
    {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 6; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);

    }

    public function notification()
    {
        $notification = array(
            'message'=>'new user add.An email was sent',
            'alert-type'=>'success'
        );

        return back()->with($notification);
    }
    


}
