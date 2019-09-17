<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Slider;

class SlidersControllerTest extends TestCase
{
 use DatabaseMigrations;   
 use WithoutMiddleware;
 
 
 public function test_index_returns()
 {
   $this->call('GET', 'sliders');
   
   $this->assertResponseOk();
   
   $this->assertViewHas('sliders');
}



public function test_create_slider_has_variables()
{
   $this->call('GET', '/sliders/create');

   $this->assertResponseOk();

   $this->assertViewHas('slider');
}

public function test_store_with_invalid_data()
{
   $params = [
   'image' => '',
   'header' => '',
   'order' => '',
   'published' => ''
   ];

   $response = $this->call('POST', route('sliders.store'), $params);
   $this->assertEquals('302', $response->status());

   $session_errors = Session::get('errors')->all();
   $this->assertNotEmpty($session_errors);	
}

public function test_store_with_valid_data()
{
   $this->visit('/sliders/create')
   ->attach(base_path('tests/assets/images/posts_1.jpg'), 'image')
   ->type('Header image', 'header')
   ->type('1', 'order')
   ->check('published')
   ->press('Create New Slider')
   ->seePageIs('/sliders')->see('Slider image has been created!');
}

public function test_edit_slider_has_valiables()
{
   $slider = factory(Slider::class)->create();

   $this->call('GET', route('sliders.edit', $slider->id));

   $this->assertResponseOk();

   $this->assertViewHas('slider');
}

public function test_update_slider_with_valid_data()
{
   $slider = factory(Slider::class)->create();
   
   $this->visit(route('sliders.edit', $slider->id))
   ->attach(base_path('tests/assets/images/posts_1.jpg'), 'image')
   ->type('Header image', 'header')
   ->type('1', 'order')
   ->check('published')
   ->press('Save slider')
   ->seePageIs('sliders/'.$slider->id.'/edit')->see('Slider image has been updated!');	
}
}
