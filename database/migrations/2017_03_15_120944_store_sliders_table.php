<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreSlidersTable extends Migration
{
 public function up()
 {
    DB::table('sliders')->truncate();

    DB::table('sliders')->insert([

        [
        'image'=> "slider_01.jpg",
        'header'=> "Header 01",
        'content'=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
        'order'=> 1,
        'published'=> 1,
        'active'=> 0,
        ],
        [
        'image'=> "slider_02.jpg",
        'header'=> "Header 02",
        'content'=> " Velit laboriosam dignissimos, deserunt quae? ",
        'order'=> 2,
        'published'=> 1,
        'active'=> 0,
        ],
        [
        'image'=> "slider_03.jpg",
        'header'=> "Header 03",
        'content'=> "Vel alias maxime ratione odit facere exercitationem,",
        'order'=> 3,
        'published'=> 1,
        'active'=> 0,
        ],
        [
        'image'=> "slider_04.jpg",
        'header'=> "Header 04",
        'content'=> " voluptatem tenetur aspernatur pariatur porro quis, nam esse ipsam molestiae?",
        'order'=> 4,
        'published'=> 1,
        'active'=> 0,
        ],
         [
        'image'=> "product_slider_01.jpg",
        'header'=> "Watch Header 01",
        'content'=> " voluptatem tenetur aspernatur pariatur porro quis, nam esse ipsam molestiae?",
        'order'=> 1,
        'published'=> 1,
        'active'=> 0,
        ],
         [
        'image'=> "product_slider_02.jpg",
        'header'=> "Watch Header 02",
        'content'=> " voluptatem tenetur aspernatur pariatur porro quis, nam esse ipsam molestiae?",
        'order'=> 2,
        'published'=> 1,
        'active'=> 0,
        ],
         [
        'image'=> "product_slider_03.jpg",
        'header'=> "Watch Header 03",
        'content'=> " voluptatem tenetur aspernatur pariatur porro quis, nam esse ipsam molestiae?",
        'order'=> 3,
        'published'=> 1,
        'active'=> 0,
        ],
        [
        'image'=> "product_slider_04.jpg",
        'header'=> "Watch Header 04",
        'content'=> " voluptatem tenetur aspernatur pariatur porro quis, nam esse ipsam molestiae?",
        'order'=> 4,
        'published'=> 1,
        'active'=> 0,
        ]

        ]);

    File::copy(public_path('themes/default/assets/images/sliders/slider_01.jpg'), public_path('/upload/sliders/'.'slider_01.jpg'));
    File::copy(public_path('themes/default/assets/images/sliders/slider_02.jpg'), public_path('/upload/sliders/'.'slider_02.jpg'));
    File::copy(public_path('themes/default/assets/images/sliders/slider_03.jpg'), public_path('/upload/sliders/'.'slider_03.jpg'));
    File::copy(public_path('themes/default/assets/images/sliders/slider_04.jpg'), public_path('/upload/sliders/'.'slider_04.jpg'));

 File::copy(public_path('themes/ecommerce/assets/images/sliders/product_slider_01.jpg'), public_path('/upload/sliders/'.'product_slider_01.jpg'));
    File::copy(public_path('themes/ecommerce/assets/images/sliders/product_slider_02.jpg'), public_path('/upload/sliders/'.'product_slider_02.jpg'));
    File::copy(public_path('themes/ecommerce/assets/images/sliders/product_slider_03.jpg'), public_path('/upload/sliders/'.'product_slider_03.jpg'));
    File::copy(public_path('themes/ecommerce/assets/images/sliders/product_slider_04.jpg'), public_path('/upload/sliders/'.'product_slider_04.jpg'));


}


public function down()
{
    DB::table('sliders')->truncate();
}
}
