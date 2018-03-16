<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create(
               [   'id' => 1,
                   'name' => 'Tinashe',
                   'surname' => 'Sivindani',
                   'email' => 'tinashe@gmail.com',
                   'departmentId' => 1,
                   'positionId' => 1,
                   'gradeId' => 1,
                    'roleId' => 1,
                  'subDepartmentId' => 1,
                   'userName' => 11233123332233,
                   'password' => bcrypt('tinashe@gmail.com')
               ]
        );

    }
}


