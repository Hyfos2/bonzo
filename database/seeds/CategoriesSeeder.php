<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Clinic'

        ]);
        Category::create([
            'id' => 2,
            'name' => 'Community Services'

        ]);
        Category::create([
            'id' => 3,
            'name' => 'Beer Hall'

        ]);
        Category::create([
            'id' => 4,
            'name' => 'How Mine Football Club'

        ]);
        Category::create([
            'id' => 5,
            'name' => 'How Mine Club'

        ]);
        Category::create([
            'id' => 6,
            'name' => 'SHEQ'

        ]);
        Category::create( [
            'id' => 7,
            'name' => 'Geology'

        ]);
        Category::create( [
            'id' => 8,
            'name' => 'Survey'

        ]);
        Category::create([
            'id' => 9,
            'name' => 'Accounts'

        ]);
        Category::create([
            'id' => 10,
            'name' => 'Stores'

        ]);
        Category::create([
            'id' => 11,
            'name' => 'Buying Office'

        ]);
        Category::create( [
            'id' => 12,
            'name' => 'IT'

        ]);
        Category::create([
            'id' => 13,
            'name' => 'Creditors'

        ]);
        Category::create([
            'id' => 14,
            'name' => 'Underground'

        ]);
        Category::create([
            'id' => 15,
            'name' => 'Surface'

        ]);

    }
}
