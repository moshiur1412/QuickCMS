<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Page;

class CategoriesControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
        
        
    public function test_count_categories()
    {
    	$categories = factory(Page::class, 10)->create();

    	$this->assertEquals(10, $categories->count());    	
    }

    public function test_index_return_categories()
    {
    	$this->call('GET', 'categories');
    	$this->assertResponseOk();
    	$this->assertViewHas('categories');
    }

    

    public function test_no_templates_exist()
    {
    	$templates = $this->getTemplates();
    	$this->assertNotEmpty($templates);
    }


    public function test_category_templates()
    {
    	$templates = $this->getTemplates();
    	$this->assertGreaterThan(0, $templates);
    }

    public function getTemplates()
    {
    	$templates = config('cms.templates');
    	return [''=>''] + array_combine(array_keys($templates), array_keys($templates));
    }

    public function test_craete_category_has_variables()
    {
    	$this->call('GET', '/categories/create');
    	$this->assertResponseOk();
    	$this->assertViewHasAll(['category', 'templates', 'orderCategories', 'languages']);
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

    	$response = $this->call('POST', route('categories.store'), $params);
        $this->assertEquals('302', $response->status());

        $session_errors = Session::get('errors')->all();
        $this->assertNotEmpty($session_errors);	
    }

    public function test_store_with_valid_data()
    {
    	$this->visit('categories/create')
    		->type('Home', 'title')
    		->type('home', 'uri')
    		->type('category', 'type')
    		->type('', 'name')
    		->type('this is my test content', 'content')
    		->select('en', 'language')
    		->type('', 'template')
    		->type(false, 'hidden')
    		->press(trans('category.create_new_category'))
    		->seePageIs('/categories')->see('Category has been created!');
    }

    public function test_edit_category_variables()
    {
    	$category = factory(Page::class)->create();
    	$this->call('GET', route('categories.edit', $category->id));
    	$this->assertResponseOk();
    	$this->assertViewHasAll(['category', 'templates', 'orderCategories', 'languages']);
    }

    public function test_update_category_with_valid_data()
    {
    	$category = factory(Page::class)->create();
         
        $this->visit(route('categories.edit', $category->id))
        	->type('Blog Post', 'title')
        	->type('blog post', 'uri')
        	->press('Save Category')
        	->seePageIs('/categories/'.$category->id.'/edit')
        	->see('Category has been updated!');
    }

    public function test_confirm_with_variables()
    {
    	$category = factory(Page::class)->create();
    	$this->call('GET', route('categories.confirm', $category->id));
    	$this->assertResponseOk();
    	$this->assertViewHas('category');
    }

    public function test_not_destory_category()
    {
    	$category = factory(Page::class)->create();
    	$this->visit(route('categories.confirm', $category->id))
    		->click('No, get me out of here!')
    		->seePageIs('/categories');
    }

    public function test_destroy_category()
    {
    	$category = factory(Page::class)->create();
    	$this->visit(route('categories.confirm', $category->id))
        	->press('Yes, delete this category')
        	->seePageIs('/categories')
        	->see('Category has been deleted!');
    }
}
