<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;


/**
* 
*/
class PostPresenter extends Presenter
{
	protected $converter;

	
    public function excerptHtml()
    {
    	$converter = new CommonMarkConverter();

    	return $this->excerpt ? $converter->convertToHtml($this->excerpt) : null;
    }

    public function bodyHtml()
    {
    	$converter = new CommonMarkConverter();

    	return $this->body ? $converter->convertToHtml($this->body) : null;
    }
	
	public function publishedDate()
	{
		if ($this->published_at) {
			return $this->published_at->toFormattedDateString();
		}

		return "Not Published";
	}

	public function publishedHighlight()
	{
		if ($this->published_at && $this->published_at->isFuture()) {
			return 'info';
		}elseif (! $this->published_at) {
			return 'warning';
		}
	}
}