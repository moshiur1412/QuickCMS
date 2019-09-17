<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\GeneralSetting;

class GeneralSettingsControllerTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    

    public function test_store_general_setting_with_valid_data()
    {
        $generalSettings = GeneralSetting::all();

        if (empty($generalSetting)) {
            $this->visit('settings/create')
            ->type('MDB', 'company_name')
            ->type('Copyright. All Rights Reserved 2017', 'copyright')
            ->attach(base_path('tests/assets/images/posts_1.jpg'), 'logo')
            ->type('example@example.com', 'email')
            ->type('2312212', 'phone')
            ->press('Save Setting');
        }

    }



    public function test_update_general_setting_with_valid_data()
    {
    	$setting = factory(GeneralSetting::class)->create();

    	$this->visit(route('settings.edit', $setting->id))
      ->type('MDB', 'company_name')
      ->type('Copyright. All Rights Reserved 2017', 'copyright')
      ->press('Save Setting')
      ->seePageIs('settings/'.$setting->id.'/edit')
      ->see('Setting has been updated!');
  }
}
