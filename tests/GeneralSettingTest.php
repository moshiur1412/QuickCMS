<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\GeneralSetting;

class GeneralSettingTest extends TestCase
{
    use DatabaseMigrations;

    public function testGeneralSettingCanBeCreated()
    {
    	$setting = factory(GeneralSetting::class)->create([
    		'company_name' => 'MDB',
	        'copyright' => 'Copyright. All Rights Reserved 2017',
	        'multilanguage' => rand(0,1),
	        'address'  => 'nikunjo 2, Dhaka',
	        'email' => 'company@example.com',
	        'phone' => '(0212) 233284',
    	]);

    	$this->seeInDatabase('general_settings', ['email'=>'company@example.com']);
    }

    public function testGeneralSettingCanBeUpdated()
    {
    	$setting = factory(GeneralSetting::class)->create();

    	$setting->company_name = 'MDB';

    	$setting->save();

    	$this->seeInDatabase('general_settings', ['company_name'=>'MDB']);
    }

    public function testGeneralSettingCanBeDeleted()
    {
    	$setting = factory(GeneralSetting::class)->create();
    	
    	$setting->delete();

    	$this->notSeeInDatabase('general_settings', ['id'=>$setting->id]);
    }
}
