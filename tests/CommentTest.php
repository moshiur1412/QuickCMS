<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use App\Post;
use App\Comment;

class CommentTest extends TestCase
{
    use DatabaseMigrations;

    public function testCommentCanBeCreated()
    {
    	$post = factory(Post::class)->create();

    	$post->comments()->save(factory(Comment::class)->create([
    		'name' => 'Example',
    		'email' => 'example@example.com',
    		'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
    	]));

    	$this->seeInDatabase('comments', ['email'=>'example@example.com']);
    }

    public function testCommentCanBeUpdated()
    {
    	$post = factory(Post::class)->create();

    	$comment = $post->comments()->save(factory(Comment::class)->create());

    	$comment->name = 'Example';

    	$comment->save();

    	$this->seeInDatabase('comments', ['name'=>'Example']);
    }

    public function testCommentCanBeDeleted()
    {
    	$post = factory(Post::class)->create();

    	$comment = $post->comments()->save(factory(Comment::class)->create());

    	$comment->delete();

    	$this->notSeeInDatabase('comments', ['id'=>$comment->id]);
    }


}
