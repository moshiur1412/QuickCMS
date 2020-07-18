<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Page;
use App\Post;

class PostsControllerTest extends TestCase
{
	use DatabaseMigrations;
    use WithoutMiddleware;


    public function test_relationship()
    {
        $category = factory(Page::class)->create([
        	'title' => 'Sports',
        	'uri' 	=> 'sports', 
        	'type' 	=> 'category',
        	'content' => 'This is my test content',
        	'hidden' => false,
        	'language' => 'en',
        	'template' => 'sports'
            ]);

        $category->posts()->save(factory(Post::class)->create());

        $posts = Post::all();

        $this->assertNotEmpty($posts);
    }

    public function test_index_returns()
    {
    	$this->call('GET', 'posts');
    	
    	$this->assertResponseOk();
    	
    	$this->assertViewHas('posts');
    }

    public function test_it_pagination()
    {
    	$posts = factory(Post::class, 100)->create();

    	$thisPage = Post::with('author')->paginate(10);

    	$this->assertEquals(10, $thisPage->count());
    }

    // public function test_list_shows_all_titles()
    // {
    //     $posts = factory(Post::class, 10)->create()->each(function($post)
    // 	{
    // 		$this->visit('/posts')->see($post->title);
    // 	});
    // }


    // public function test_create_post_has_variables()
    // {
    // 	$this->call('GET', '/posts/create');
    // 	$this->assertResponseOk();
    // 	$this->assertViewHasAll(['post', 'categories', 'languages']);
    // }

    public function test_store_with_invalid_data()
    {
    	$params = [
      'author_id' => '',
      'category_id' => '',
      'title' => '',
      'language' =>'',
      'image' => '',
      'body' => '',
      'publish_at' => ''
      ];

      $response = $this->call('POST', route('posts.store'), $params);
      $this->assertEquals('302', $response->status());

      $session_errors = Session::get('errors')->all();
      $this->assertNotEmpty($session_errors);	
  }

//   public function test_store_post_with_valid_data()
//   {
//    $this->visit('/posts/create')
//    ->type('My first post', 'title')
//    ->select(1, 'category_id')
//    ->select('en', 'language')
//    ->attach(base_path('tests/assets/images/posts_1.jpg'), 'image')
//    ->type('Test body', 'body')
//    ->press('Create New Post')
//    ->seePageIs('/posts')->see('Post has been created!');

// }

 // public function test_edit_post_has_variables()
 // {
 //     $post = factory(Post::class)->create();
 //     $this->call('GET', route('posts.edit', $post->id));
 //     $this->assertResponseOk();
 //     $this->assertViewHasAll(['post', 'categories', 'languages']);
 // }

 // public function test_update_post_with_valid_data()
 // {
 //     $post = factory(Post::class)->create();
 //     $this->visit(route('posts.edit', $post->id))
 //     ->type('My first post', 'title')
 //     ->select(1, 'category_id')
 //     ->select('en', 'language')
 //     ->attach(base_path('tests/assets/images/posts_1.jpg'), 'image')
 //     ->type('Test body', 'body')
 //     ->press('Save Post')
 //     ->seePageIs('/posts/'.$post->id.'/edit')->see('Post has been updated!');

 // }

 // public function test_not_destroy_post()
 // {
 //     $post = factory(Post::class)->create();
 //     $this->visit(route('posts.confirm', $post->id))
 //     ->click('No, get me out of here!')
 //     ->seePageIs('/posts');
 // }

 // public function test_destroy_post()
 // {
 //     $post = factory(Post::class)->create();
 //     $this->visit(route('posts.confirm', $post->id))
 //     ->press('Yes, delete this post')
 //     ->seePageIs('/posts')
 //     ->see('Post has been deleted!');
 // }
}
