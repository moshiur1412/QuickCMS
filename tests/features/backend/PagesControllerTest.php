<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Page;


class PagesControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    
    
    public function test_count_pages()
    {
    	$pages = factory(Page::class, 10)->create();

    	$this->assertEquals(10, $pages->count());    	
    }

    public function test_index_return_pages($value='')
    {
    	$this->call('GET', 'pages');
    	$this->assertResponseOk();
    	$this->assertViewHas('pages');
    }

    public function test_list_shows_all_titles()
    {
      $pages = factory(Page::class, 5)->create()->each(function($page)
      {
         $this->visit('/pages');
     });
  }

  public function test_no_templates_exist()
  {
   $templates = $this->getTemplates();
   $this->assertNotEmpty($templates);
}


public function test_page_templates()
{
   $templates = $this->getTemplates();
   $this->assertGreaterThan(0, $templates);
}

public function getTemplates()
{
   $templates = config('cms.templates');
   return [''=>''] + array_combine(array_keys($templates), array_keys($templates));
}

public function test_craete_page_has_variables()
{
   $this->call('GET', '/pages/create');
   $this->assertResponseOk();
   $this->assertViewHasAll(['page', 'templates', 'orderPages', 'languages']);
}

public function test_store_with_invalid_data()
{
   $params = [
   'title' => '',
   'uri' 	=> '', 
   'page' 	=> '',
   'name' 	=> '',
   'content' => '',
   'language' => '',
   'hidden' => false,
   ];

   $response = $this->call('POST', route('pages.store'), $params);
   $this->assertEquals('302', $response->status());

   $session_errors = Session::get('errors')->all();
   $this->assertNotEmpty($session_errors);	
}

public function test_store_with_valid_data()
{
   $this->visit('pages/create')
   ->type('Home', 'title')
   ->type('home', 'uri')
   ->type('page', 'type')
   ->type('', 'name')
   ->type('this is my test content', 'content')
   ->select('en', 'language')
   ->type('', 'template')
   ->type(false, 'hidden')
   ->press(trans('page.create_new_page'))
   ->seePageIs('/pages')->see('Page has been created!');
}

public function test_edit_page_variables()
{
   $page = factory(Page::class)->create();
   $this->call('GET', route('pages.edit', $page->id));
   $this->assertResponseOk();
   $this->assertViewHasAll(['page', 'templates', 'orderPages', 'languages']);
}

public function test_update_page_with_valid_data()
{
   $page = factory(Page::class)->create();
   
   $this->visit(route('pages.edit', $page->id))
   ->type('Blog Post', 'title')
   ->type('blog post', 'uri')
   ->press('Save Page')
   ->seePageIs('/pages/'.$page->id.'/edit')
   ->see('Page has been updated!');
}

public function test_confirm_with_variables()
{
   $page = factory(Page::class)->create();
   $this->call('GET', route('pages.confirm', $page->id));
   $this->assertResponseOk();
   $this->assertViewHas('page');
}

public function test_not_destory_page()
{
   $page = factory(Page::class)->create();
   $this->visit(route('pages.confirm', $page->id))
   ->click('No, get me out of here!')
   ->seePageIs('/pages');
}

public function test_destroy_page()
{
   $page = factory(Page::class)->create();
   $this->visit(route('pages.confirm', $page->id))
   ->press('Yes, delete this page')
   ->seePageIs('/pages')
   ->see('Page has been deleted!');
}
}
