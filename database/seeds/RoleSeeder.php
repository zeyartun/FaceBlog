<?php

use Illuminate\Database\Seeder;
use App\role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin','Manager','Author'];
        for ($i=0; $i < 3; $i++) { 
            $role = new role();
            $role->role_name = $roles[$i];
            $role->save();
        }
        
    }
}
