<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UsersControllerTest extends TestCase
{
    
	use DatabaseMigrations;
	use WithoutMiddleware;

	public function test_index_returns()
	{
		$this->call('GET', '/users');
		$this->assertResponseOk();
		$this->assertViewHas('users');
	}

	public function test_add_user()
	{
		// $user = factory( User::class )->create();

		$this->post('/users/addUser', 
				['name' => 'Example', 'email'=>'example@example.com', 'role'=>'admin'])
	            ->seeJson([
	             	'name' => 'Example',
	             	'email' => 'example@example.com'
	            ])->seeStatusCode(200);
	}

	// public function test_edit_user()
	// {
	// 	$user = factory(User::class)->create();

	// 	$this->call('PUT', '/users/editUser', ['name' => 'Example'])
	// 		->seeJson([
	// 			'name' => 'Example'
	// 		]);
	// }

	// public function test_delete_user()
	// {
	// 	$user = factory(User::class)->create();

	// 	$this->delete('/users/deleteUser', $user->id)->seeStatusCode(204);
	// }

}
