<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $filePath = public_path('storage/images');

    return [
        

        'title' => $faker->title,
        'body' => $faker->realText(500),
        'user_id' => function(){
            return factory('App\User')->create()->id;},
        'image' => $faker->image($filePath,400,300),
        'approved' =>false,
        'created_at' =>\Carbon\Carbon::now(),
        'updated_at' =>\Carbon\Carbon::now()
   
    ];
});
