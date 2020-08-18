<?php

use Illuminate\Database\Seeder;

use App\role_user;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker\factory::create();

        for ($i=0; $i < 4; $i++) { 
            $roleUser = new role_user();
            $roleUser->user_id = $i;
            $roleUser->role_id = rand(1,3);
            $roleUser->save();
        }
    }
}
