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

        for ($i=1; $i < 10; $i++) { 
            $roleUser = new role_user();
            $roleUser->user_id = $i;
            if($i < 3){
                $roleUser->role_id = 1;
            }else{
                $roleUser->role_id = rand(1,3);
            }
            $roleUser->save();
        }
    }
}
