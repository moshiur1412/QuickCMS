<?php 

namespace App\Templates;

use Illuminate\View\View;
use App\Post;
use Carbon\Carbon;
use App\Comment;
/**
* 
*/
class SinglePostTemplate extends AbstractTemplate
{
	
	protected $view = 'single_post';

	protected $posts;

	function __construct(Post $posts)
	{
		$this->posts = $posts;
	}

	public function prepare(View $view, array $parameters)	
	{
		$post = $this->posts->with('comments')->where('id', $parameters['id'])->where('slug', $parameters['slug'])->first();
		$comment = new Comment;
		$view->with('post', $post)->with('comment', $comment);
	}
}