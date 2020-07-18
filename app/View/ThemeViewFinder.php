<?php 

namespace App\View;

use Illuminate\View\FileViewFinder;

/**
* It'll override laravel view finder with this cusomt view finder. Once a file is requested it'll search through all the directory until the file is found.
*/
class ThemeViewFinder extends FileViewFinder
{
	
	protected $activeTheme;
	protected $basePath;

	public function setBasePath($path)
	{
		$this->basePath = $path;
	}

	public function setActiveTheme($theme)
	{
		$this->activeTheme = $theme;

		array_unshift($this->paths, $this->basePath.'/'.$theme.'/views');
	}

	public function setHints($hints) {
        $this->hints = $hints;
    }
}
