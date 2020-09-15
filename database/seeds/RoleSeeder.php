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
        $roles = ['Admin','Manager','Author','User'];
        for ($i=0; $i < 4; $i++) { 
            $role = new role();
            $role->role_name = $roles[$i];
            $role->save();
        }
        
    }
}
