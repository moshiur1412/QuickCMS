<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Slider;

class SliderTest extends TestCase
{
    use DatabaseMigrations;

    public function testSliderCanBeCreated()
    {
    	factory(Slider::class)->create([
    		'image' => 'default.jpg',
	        'header' => 'Header Image',
	        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod',
	        'order' => rand(0,10),
	        'published'  => rand(0, 1)
    	]);

    	$this->seeInDatabase('sliders', ['header'=>'Header Image']);
    }

    public function testSliderCanBeUpdate()
    {
    	$slider = factory(Slider::class)->create();

    	$slider->header = 'Header Image';

    	$slider->save();

    	$this->seeInDatabase('sliders', ['header'=>'Header Image']);
    }

    public function testSliderCanBeDeleted()
    {
    	$slider = factory(Slider::class)->create();
    	$slider->delete();
    	$this->notSeeInDatabase('sliders', ['id'=>$slider->id]);
    }
}
