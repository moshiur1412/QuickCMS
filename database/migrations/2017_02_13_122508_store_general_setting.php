<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreGeneralSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('general_settings')->truncate();

        DB::table('general_settings')->insert([
            'company_name'=> "Bangladesh IT Ltd",
            'logo'=> "logo.png",
            'copyright'=> "This is the copyright test",
            'multilanguage'=> null,
            'default_language'=> null,
            'address'=> "Dhaka, Bagladesh",
            'email'=> "bit@bit.co",
            'phone'=> "01557390493",
            'map'=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d456.2173786382559!2d90.41866795868293!3d23.82787737730327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65b8927703b%3A0xbe2f3a207be51d4e!2sMDB+Corporation!5e0!3m2!1sen!2s!4v1486967434256" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',

            
            ]);
        File::copy(public_path('themes/default/assets/images/logo.png'), public_path('/upload/general_settings/'.'logo.png'));

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
