<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DepartmentsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(PositionsSeeder::class);
        $this->call(EmploymentTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(leaverequestStatusSeeder::class);

    }
}
