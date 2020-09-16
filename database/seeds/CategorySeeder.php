<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Facker = Faker\Factory::create();

        for ($i = 0; $i < 4; $i++) {
            $Category = new Category();
            $Category->Category_name = $Facker->text(10);
            $Category->save();
        }
    }
}
