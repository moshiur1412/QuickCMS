<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::table('pages')->insert([
       [
       'title' => 'IT',
       'uri'    => 'it',
       'content'=> 'This is the sport category.',
       'type' => 'category',
       'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 3,
       'rgt' => 6,
       'depth' => 0
       ],
       [
       'title' => 'Headlines',
       'uri'    => 'headlines',
       'content'=> 'This is the headlines category.',
       'type' => 'category',
       'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => 7,
       'lft' => 4,
       'rgt' => 5,
       'depth' => 1
       ],
       [
       'title' => 'Opinion',
       'uri'    => 'opinion',
       'content'=> 'This is the opinion category.',
       'type' => 'category',
       'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 1,
       'rgt' => 2,
       'depth' => 0
       ],
       [
       'title' => 'World',
       'uri'   => 'world',
       'content'=> 'This is the world category.',
       'type' => 'category',
       'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 7,
       'rgt' => 8,
       'depth' => 0
       ],
       [
       'title' => 'Latest Watches',
       'uri'   => 'latest-watches',
       'content'=> 'This is the latest product category.',
       'type' => 'ecommerce',
       'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 20,
       'rgt' => 21,
       'depth' => 0
       ],
        [
       'title' => 'Best Product',
       'uri'   => 'best-product',
       'content'=> 'This is the best product category.',
       'type' => 'ecommerce',
        'template' => null,
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 22,
       'rgt' => 23,
       'depth' => 0
       ],
       
        [
       'title' => 'Timex',
       'uri'   => 'timex',
       'content'=> 'This is the timex product category.',
       'type' => 'ecommerce',
       'template' => 'products',
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 24,
       'rgt' => 25,
       'depth' => 0
       ],
       
         [
       'title' => 'Citizen',
       'uri'   => 'citizen',
       'content'=> 'This is the timex product category.',
       'type' => 'ecommerce',
       'template' => 'products',
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 26,
       'rgt' => 27,
       'depth' => 0
       ],
         [
       'title' => 'Fastrack',
       'uri'   => 'fastrack',
       'content'=> 'This is the timex product category.',
       'type' => 'ecommerce',
       'template' => 'products',
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 28,
       'rgt' => 29,
       'depth' => 0
       ],
         [
       'title' => 'Casio',
       'uri'   => 'casio',
       'content'=> 'This is the timex product category.',
       'type' => 'ecommerce',
       'template' => 'products',
       'language' => Lang::getLocale(),
       'parent_id' => null,
       'lft' => 30,
       'rgt' => 31,
       'depth' => 0
       ]
       
       ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
  }
