<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class PostTest extends TestCase
{
 	use DatabaseMigrations;   

 	public function testPostCabBeCreated()
 	{
 		factory(Post::class)->create([
 			'category_id' => rand(1,10),
 			'author_id' => rand(1, 10),
 			'title' => 'Test post title',
 			'body'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
 		]);
 		$this->seeInDatabase('posts', ['title'=>'Test post title']);
 	}

 	public function testPostCanBeUpdated()
 	{
 		$post = factory(Post::class)->create();
 		
 		$post->title = 'Update my post title';
 		
 		$post->save();

 		$this->seeInDatabase('posts', ['title'=>'Update my post title']);
 	}

 	public function testPostCanBeDeleted($value='')
 	{
 		$post = factory(Post::class)->create();
 		$post->delete();
 		$this->notSeeInDatabase('posts', ['id'=>$post->id]);
 	}

}
