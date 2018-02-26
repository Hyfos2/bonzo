<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{

    public function run()
    {
       Role::create([ 'id'=>1, 'name'=>'Owner']);
        Role::create([ 'id'=>2, 'name'=>'Member']);
        Role::create([ 'id'=>3, 'name'=>'Visitor']);
    }
}
