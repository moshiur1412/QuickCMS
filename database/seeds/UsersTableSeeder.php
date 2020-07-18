<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      DB::table('users')->insert([
        [
        'name' => 'super admin',
        'email' => 'mdbcorporationbd@gmail.com',
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
  }
