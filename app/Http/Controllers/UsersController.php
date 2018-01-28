<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{
   use RegistersUsers;
   public function index()
  {
   	    //return "okay"; 

   		$users = \DB::table('users')
			->Join('positions', 'positions.id', '=','users.positionId' )
            ->Join('grades', 'grades.id', '=', 'users.gradeId')
			->select(
				\DB::raw(
					"
                                         users.id,
                                         users.created_at,
                                         users.name,
                                         users.surname,
                                         users.email,
                                         grades.name as gradeName,
                                         positions.name as position
                                        "
				)
			);

		return Datatables::of($users)
			->addColumn('actions', '<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>


                                        '
			)->make(true);

   }


    public function addUser(Request $request)
    {

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
}
