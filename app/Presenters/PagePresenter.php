<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;


/**
* 
*/
class PagePresenter extends Presenter
{
	protected $converter;


	public function contentHtml()
	{
		// $environment = Environment::createCommonMarkEnvironment();

		// // Define your configuration:
		// $config = ['html_input' => 'escape'];

		// // Create the converter
		$converter = new CommonMarkConverter();

		return $converter->convertToHtml($this->content);
	}
	
	public function prettyUri()
	{
		return '/'.ltrim($this->uri, '/');
	}

	public function linkToPaddedTitle($link)
	{
		$padding = str_repeat("_", $this->depth * 4);

		return $padding.link_to($link, $this->title);
	}

	public function paddedTitle()
	{
	    return str_repeat("_", $this->depth * 4).$this->title;
	}

	public function uriWildCard()
	{
		return $this->uri.'*';
	}
}