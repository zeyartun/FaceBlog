<?php

use Illuminate\Database\Seeder;
use App\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker\factory::create();
        
        for ($i=0; $i < 20 ; $i++) { 
            $post = new post();
            $post->user_id = rand(1,4);
            $post->post_title = $faker->text(20);
            $post->post_content = $faker->text(200);
            $post->save();
        }
    }
}
