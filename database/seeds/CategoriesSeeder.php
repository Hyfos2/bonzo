<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Clinic',
              'departmentId' =>2

        ]);
        Category::create([
            'id' => 2,
            'name' => 'Community Services'
              ,'departmentId' =>2

        ]);
        Category::create([
            'id' => 3,
            'name' => 'Beer Hall'
            ,'departmentId' =>2

        ]);
        Category::create([
            'id' => 4,
            'name' => 'How Mine Football Club'
            ,'departmentId' =>2
        ]);
        Category::create([
            'id' => 5,
            'name' => 'How Mine Club'
            ,'departmentId' =>2
        ]);
        Category::create([
            'id' => 6,
            'name' => 'SHEQ'
            ,'departmentId' =>4
        ]);
        Category::create( [
            'id' => 7,
            'name' => 'Geology'
            ,'departmentId' =>4
        ]);
        Category::create( [
            'id' => 8,
            'name' => 'Survey'
            ,'departmentId' =>4
        ]);
        Category::create([
            'id' => 9,
            'name' => 'Accounts'
            ,'departmentId' =>1
        ]);
        Category::create([
            'id' => 10,
            'name' => 'Stores'
            ,'departmentId' =>1
        ]);
        Category::create([
            'id' => 11,
            'name' => 'Buying Office'
            ,'departmentId' =>1
        ]);
        Category::create( [
            'id' => 12,
            'name' => 'IT'
            ,'departmentId' =>1
        ]);
        Category::create([
            'id' => 13,
            'name' => 'Creditors'
            ,'departmentId' =>1
        ]);
        Category::create([
            'id' => 14,
            'name' => 'Underground'
            ,'departmentId' =>3
        ]);
        Category::create([
            'id' => 15,
            'name' => 'Surface'
            ,'departmentId' => 3
        ]);

    }
}
