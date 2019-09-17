<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;
use App\Comment;

class CommentsControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function test_relationship_with_post()
    {
    	$post = factory(Post::class)->create();
    	
    	$post->comments()->save(factory(Comment::class)->create());

    	$comments = Comment::all();

    	$this->assertNotEmpty($comments);
    }

    public function test_index_returns()
    {
    	$this->call('GET', 'comments');

    	$this->assertResponseOk();
    	
    	$this->assertViewHas('comments');
    }

    public function test_it_pagination()
    {
    	factory(Comment::class, 100)->create();

    	$comments = Comment::paginate(25);

    	$this->assertEquals(25, $comments->count());
    }

    public function test_list_shows_all_titles()
    {
    	$comments = factory(Comment::class, 25)->create()->each(function($comment)
    	{
    		$this->visit('/comments')->see($comment->email);
    	});
    }

    public function test_store_comment_with_invalid_data()
    {
    	$params = [
    		'name' => '',
    		'email' => '',
    		'message' => ''
    	];

    	$response = $this->call('POST', route('posts.store'), $params);
    	
    	$this->assertEquals('302', $response->status());

    	$session_errors = Session::get('errors')->all();

    	$this->assertNotEmpty($session_errors);	
    }

  //   public function test_store_comment_with_valid_data()
  //   {
  //   	// $this->artisan('db:seed');
  //   	$this->seed('DatabaseSeeder');

  //   	// $page = factory(App\Page::class)->create([
  //   	// 	'title' => 'Single Post',
  //   	// 	'uri' => 'single-post',
  //   	// 	'content' => 'Test content',
  //   	// 	'type' => 'page',
  //   	// 	'language' => 'en',
  //   	// 	'hidden' => true
  //   	// ]);

		// // Route::get('blog/{id}/{slug}', 'App\Http\Controllers\PageController@show');

  //   	// Route::app->call('App\Http\Controllers\PageController@show', [
  //   	// 					'page' => $page,
  //   	// 					'parameters' => Route::current()->parameters()
  //   	// 					]);

  //   	$post = factory(Post::class)->create();
  //   	$this->visit('/blog/'.$post->id.'/'.$post->slug)
  //   		->type('Example', 'name')
  //   		->type('example@example.com', 'email')
  //   		->type('this is test message', 'message')
  //   		->press('Save')
  //   		->seePageIs(route('single-post', [$post->id, $post->slug]));
  //   }

    public function test_update_comment_with_valid_data()
    {
    	$comment = factory(Comment::class)->create();

    	$this->visit(route('comments.edit', $comment->id))
    		->type('Example', 'name')
    		->press('Save')
    		->seePageIs('/comments/'.$comment->id.'/edit')
    		->see('Comments has been update!');
    }

    public function test_not_destroy_comment()
    {
    	$comment = factory(Comment::class)->create();
    	$this->visit(route('comments.confirm', $comment->id))
    		->click('No, get me out of here!')
    		->seePageIs('/comments');
    }

    public function test_destory_comment()
    {
    	$comment = factory(Comment::class)->create();
    	$this->visit(route('comments.confirm', $comment->id))
    		->press('Yes, delete this comment')
        	->seePageIs('/comments')
        	->see('Comment has been deleted!');
    }
}
