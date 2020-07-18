<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreUsers extends Migration
{
       public function up()
    {
      DB::table('users')->truncate();
      DB::table('users')->insert([
        [
        'name' => 'super admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('123456'),
        'last_login_at' => date('Y-m-d H:i:s'),
        'role' => 'super admin',
        ],
        [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'last_login_at' => date('Y-m-d H:i:s'),
        'role' => 'admin',
        ],
        [
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => bcrypt('123456'),
        'last_login_at' => date('Y-m-d H:i:s'),
        'role' => 'user',
        ],
        [
        'name' => 'Normal User',
        'email' => 'normaluser@gmail.com',
        'password' => bcrypt('123456'),
        'last_login_at' => date('Y-m-d H:i:s'),
        'role' => 'user',
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
      DB::table('users')->truncate();
    }
  }
