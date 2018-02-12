<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsSeeder extends Seeder
{

    public function run()
    {
        Department::create([
            'id' => 1,
                'name' => 'Finance'

             ]);
        Department::create([
                'id' => 2,
                'name' => 'Human Resources'

            ]);
        Department::create([
                'id' => 3,
                'name' => 'Mining and Security'

            ]);
        Department::create([
                'id' => 4,
                'name' => 'Technical Services'

            ]);
    }
}
