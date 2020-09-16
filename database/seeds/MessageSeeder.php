<?php

use Illuminate\Database\Seeder;
use App\Message;
class MessageSeeder extends Seeder
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
            $message = new Message();
            $message->name = $faker->name;
            $message->email = $faker->email;
            $message->subject = $faker->text(50);
            $message->message = $faker->text(100);
            $message->save();
        }
    }
}
