<?php


use App\Page;
use App\Post;
use App\Comment;
use App\User;
use App\GeneralSetting;
use App\Slider;
use App\Feedback;

/*
|--------------------------------------------------------------------------
| Model Factories test database
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => 'admin'
    ];
});

$factory->define(Page::class, function (Faker\Generator $faker) {
    
    return [
        'title' => $faker->unique()->userName,
        'uri'   => preg_replace("![^a-z0-9]+!i", "-", $faker->unique()->userName),
        'content'=> $faker->paragraph,
        'type' => 'page',
        'template' => 'home',
        'hidden' => rand(0,1),
        'language' => 'en'
    ];
});


$factory->define(Post::class, function(Faker\Generator $faker){
    
    return [
        'category_id' => rand(1,10),
        'author_id' => rand(1, 10),
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'language' => 'en'
    ];

});

$factory->define(Comment::class, function(Faker\Generator $faker){
    
    return [
        'post_id' => rand(1,10),
        'name' => $faker->name,
        'email' => $faker->email,
        'message'  => $faker->paragraph
    ];

});

$factory->define(GeneralSetting::class, function(Faker\Generator $faker){
    
    return [
        'company_name' => $faker->company,
        'copyright' => $faker->sentence,
        'multilanguage' => rand(0,1),
        'address'  => $faker->address,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber
    ];

});

$factory->define(Slider::class, function(Faker\Generator $faker){
    
    return [
        'image' => $faker->image,
        'header' => $faker->sentence,
        'content' => $faker->sentence,
        'order' => rand(0,10),
        'published'  => rand(0, 1)
    ];

});

$factory->define(Feedback::class, function(Faker\Generator $faker){
    
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'subject' => $faker->sentence,
        'message'  => $faker->paragraph
    ];

});

