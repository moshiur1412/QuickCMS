<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
class UserTest extends TestCase
{
    use DatabaseMigrations;   

    public function testPostCabBeCreated()
    {
    	factory(User::class)->create([
    		'name' => 'Example',
    		'email' => 'example@example.com',
    		'password' => bcrypt('secret'),
    		'role' => 'admin'
    	]);
    	$this->seeInDatabase('users', ['email'=>'example@example.com']);
    }

    public function testPostCanBeUpdated()
    {
    	$user = factory(User::class)->create();
    	
    	$user->name = 'Example';
    	
    	$user->save();

    	$this->seeInDatabase('users', ['name'=>'Example']);
    }

    public function testPostCanBeDeleted($value='')
    {
    	$user = factory(User::class)->create();
    	$user->delete();
    	$this->notSeeInDatabase('users', ['id'=>$user->id]);
    }
}
