<?php

use Illuminate\Database\Seeder;
use App\CategoryPost;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20; $i++){
            $cpost = new CategoryPost;
            $cpost->category_id = rand(1,4);
            $cpost->post_id = rand(1,20);

            $cpost->save();
        }
    }
}
