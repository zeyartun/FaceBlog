<?php

use Illuminate\Database\Seeder;
use App\comment_user;

class CommentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker\factory::create();

        for ($i=0; $i < 200 ; $i++) { 

            $commentUser = new comment_user();
            $commentUser->comment_id = $i;
            $commentUser->user_id = rand(1,3);
            $commentUser->save();
        }
        //
    }
}
