<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;


/**
* 
*/
class CommentPresenter extends Presenter
{
	protected $converter;

	
    public function messageHtml()
    {
    	$converter = new CommonMarkConverter();

    	return $this->message ? $converter->convertToHtml($this->message) : null;
    }
}