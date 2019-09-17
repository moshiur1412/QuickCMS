<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('blocks')->truncate();

        DB::table('blocks')->insert([
            [
            'title'=> "Slider",
            'position'=> "slider",
            'display'=> "home",
            'column'=> null,
            'filter'=> "recent",
            'category_id'=> 0,
            'limit'=> 6,
            'show_title'=> 0,
            'published'=> 1,
            'order'=> 0,
            'style'=> "slider",
            ],

            [
            'title'=> "First Block",
            'position'=> "block",
            'display'=> "home",
            'column'=> null,
            'filter'=> "recent",
            'category_id'=> 0,
            'limit'=> 3,
            'show_title'=> 1,
            'published'=> 1,
            'order'=> 2,
            'style'=> "style-1",
            ],
            [
            'title'=> "Second Block",
            'position'=> "block",
            'display'=> "home",
            'column'=> null,
            'filter'=> "category",
            'category_id'=> 6,
            'limit'=> 2,
            'show_title'=> 1,
            'published'=> 1,
            'order'=> 2,
            'style'=> "style-2",
            ],
            [
            'title'=> "Third Block",
            'position'=> "block",
            'display'=> "home",
            'column'=> null,
            'filter'=> "random",
            'category_id'=> 0,
            'limit'=> 6,
            'show_title'=> 1,
            'published'=> 1,
            'order'=> 3,
            'style'=> "style-3",
            ],

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
