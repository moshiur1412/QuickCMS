<?php 

namespace App\Providers\Composers;

use Lang;
use App\Page;
use App\GeneralSetting;
use Illuminate\View\View;

/**
* 
*/
class InjectPages
{
	protected $pages;
	protected $generalSettings;

	function __construct(Page $pages, GeneralSetting $generalSettings)
	{
		$this->pages = $pages;
		$this->generalSettings = $generalSettings;
	}

	public function compose(View $view)
	{
		$pages = $this->pages->where('hidden', false)->where('type', 'page')->where('language', Lang::getLocale())->get()->toHierarchy();
		$categories = $this->pages->where('hidden', false)->where('type', 'category')->where('language', Lang::getLocale())->get()->toHierarchy();

		$generalSetting = $this->generalSettings->first();

		$view->with('pages', $pages)->with('generalSetting', $generalSetting)->with('categories', $categories);
	}
}