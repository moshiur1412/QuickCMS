<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Page;

class PageTest extends TestCase
{
    use DatabaseMigrations;

    public function testPageCanBeCreated()
    {
        $page = factory(Page::class)->create(['title'=>'Test Blog', 'uri'=>'testBlog', 'content'=> 'This is the media page.', 'type' => 'page', 'template' => 'home', 'hidden' => 0, 'language' => 'en']);

        $this->seeInDatabase('pages', ['uri'=>'testBlog']);
    }

    public function testPageCanBeDeleted()
    {
		$page = factory(Page::class)->create(['title'=>'Test Blog', 'uri'=>'testBlog', 'content'=> 'This is the media page.', 'type' => 'page', 'template' => 'home', 'hidden' => 0, 'language' => 'en']);
		
		$page->delete();

		$this->notSeeInDatabase('pages', ['uri'=>'testBlog']);
    }

    public function testPageCanBeUpdated()
    {
    	$page = factory(Page::class)->create(['title'=>'Test Blog', 'uri'=>'testBlog', 'content'=> 'This is the media page.', 'type' => 'page', 'template' => 'home', 'hidden' => 0, 'language' => 'en']);

    	$page->title = 'Update Test Blog';
    	$page->save();
    	$this->seeInDatabase('pages', ['title'=>'Update Test Blog']);
    }


}
