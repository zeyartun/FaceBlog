<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // $this->call(CommentUserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(CategoryPostSeeder::class);
        $this->call(CategorySeeder::class);

    }
}
