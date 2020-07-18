<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Feedback;

class FeedbackTest extends TestCase
{
    use DatabaseMigrations;

    public function testSliderCanBeCreated()
    {
    	factory(Feedback::class)->create([
    		'name' => 'Example',
	        'email' => 'example@example.com',
	        'subject' => 'Test feedback subject',
	        'message'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
    	]);

    	$this->seeInDatabase('feedback', ['name'=>'Example']);
    }

    public function testSliderCanBeUpdate()
    {
    	$feedback = factory(Feedback::class)->create();

    	$feedback->name = 'Example';

    	$feedback->save();

    	$this->seeInDatabase('feedback', ['name'=>'Example']);
    }

    public function testSliderCanBeDeleted()
    {
    	$feedback = factory(Feedback::class)->create();
    	$feedback->delete();
    	$this->notSeeInDatabase('feedback', ['id'=>$feedback->id]);
    }
}
