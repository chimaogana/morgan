<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory('App\Post', 20)->create();
    }
}
