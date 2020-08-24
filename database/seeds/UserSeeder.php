<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = "zeyar$i@gmail.com";
            $user->password = bcrypt('password'); 
            $user->save();
        }
    }
}
