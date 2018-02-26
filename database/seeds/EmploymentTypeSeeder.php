<?php

use Illuminate\Database\Seeder;
use App\EmploymentType;

class EmploymentTypeSeeder extends Seeder
{
    public function run()
    {
        EmploymentType::create(
            [   'id' => 1,
                'name' => 'Permanent',

            ]
        );

        EmploymentType::create(
            [   'id' => 2,
                'name' => 'Contract',

            ]
        );
    }
}

