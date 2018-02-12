<?php

use Illuminate\Database\Seeder;
use App\Grade;
class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'id'=>1,
            'grade'=>1,
            'salary'=>400

        ]);
        Grade::create([
            'id'=>2,
            'grade'=>2,
            'salary'=>450

        ]);
        Grade::create([
            'id'=>3,
            'grade'=>3,
            'salary'=>480

        ]);
        Grade::create([
            'id'=>4,
            'grade'=>4,
            'salary'=>500

        ]);
        Grade::create([
            'id'=>5,
            'grade'=>5,
            'salary'=>550

        ]);
        Grade::create([
            'id'=>6,
            'grade'=>6,
            'salary'=>570

        ]);
        Grade::create([
            'id'=>7,
            'grade'=>7,
            'salary'=>580

        ]);
        Grade::create([
            'id'=>8,
            'grade'=>8,
            'salary'=>600

        ]);
        Grade::create([
            'id'=>9,
            'grade'=>9,
            'salary'=>640

        ]);
        Grade::create([
            'id'=>10,
            'grade'=>10,
            'salary'=>660

        ]);
        Grade::create([
            'id'=>11,
            'grade'=>11,
            'salary'=>700

        ]);
        Grade::create( [
            'id'=>12,
            'grade'=>12,
            'salary'=>750

        ]);
        Grade::create([
            'id'=>13,
            'grade'=>13,
            'salary'=>800

        ]);
        Grade::create([
            'id'=>14,
            'grade'=>14,
            'salary'=>850

        ]);
        Grade::create([
            'id'=>15,
            'grade'=>15,
            'salary'=>900

        ]);
        Grade::create([
            'id'=>16,
            'grade'=>16,
            'salary'=>950

        ]);
        Grade::create([
            'id'=>17,
            'grade'=>'FD',
            'salary'=>1000

        ]);
        Grade::create([
            'id'=>18,
            'grade'=>'MD',
            'salary'=>1100

        ]);


    }
}
