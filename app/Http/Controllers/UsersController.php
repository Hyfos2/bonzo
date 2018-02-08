<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;
use App\Grade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
   use RegistersUsers;
   public function index()
  {

      $users = User::with('grade','position')->get();
      return Datatables::of($users)
           ->addColumn('action', function ($users) {
               return '<a href="editUser/'.$users->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
           })
           ->make(true);
   }


    public function usersList()
    {
      return view ('users.usersList');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function registernewUser()
    {
        $pos     =Position::all();
        $grade   =Grade::all();
        return view('users.register',compact('pos','grade'));
    }
    public  function editUser($id)
    {
        $userDetails  = User::with('position','grade')->find($id);
        return  view('users.userProfile',compact('userDetails'));
    }
}
