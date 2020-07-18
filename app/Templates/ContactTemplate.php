<?php
namespace App\Templates; 
use Illuminate\View\View;

use App\GeneralSetting;

class ContactTemplate extends AbstractTemplate{
	protected $view ='contact';
	protected $generalSettings;
	
	function __construct(GeneralSetting $generalSettings)
	{
		$this->generalSettings = $generalSettings;
	}

	public function prepare(View $view, array $parameters){
		$generalSetting = $this->generalSettings->first();

		return $view->with('generalSetting', $generalSetting);
	}

}