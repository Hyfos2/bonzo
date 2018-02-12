<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(PositionsSeeder::class);
    }
}
