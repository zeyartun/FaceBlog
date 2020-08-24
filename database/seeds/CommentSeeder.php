<?php

use Illuminate\Database\Seeder;
use App\comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {
            $comment = new comment();
            $comment->post_id = rand(1,20);
            $comment->user_id = rand(1,20);
            $comment->comment = $faker->text(100);
            $comment->save();
        }
    }
}
