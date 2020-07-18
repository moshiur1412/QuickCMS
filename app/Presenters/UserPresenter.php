<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Carbon\Carbon;

/**
* 
*/
class UserPresenter extends Presenter
{
	public function lastLoginDifference()
	{
	   $last_login_at = Carbon::parse($this->last_login_at);
	   return $last_login_at->diffForHumans();
	}
}


	