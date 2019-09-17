<?php 

namespace App\Templates;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Post;
/**
* 
*/
class BlogTemplate extends AbstractTemplate
{
	
	protected $view = 'blog';

	protected $posts; 

	function __construct(Post $posts)
	{
		$this->posts = $posts;
	}

	public function prepare(View $view, array $parameters)	
	{
		$posts = $this->posts->with('author')
							 ->where('published_at', '<', Carbon::now())
							 ->orderBy('published_at', 'desc')
							 ->paginate(10);
		$view->with('posts', $posts);
	}
}