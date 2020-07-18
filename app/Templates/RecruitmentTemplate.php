<?php 

namespace App\Templates;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Post;
use App\Page;
/**
* 
*/
class RecruitmentTemplate extends AbstractTemplate
{
	
	protected $view = 'recruitment';

	protected $posts; 
	protected $pages;

	function __construct(Post $posts, Page $pages)
	{
		$this->posts = $posts;
		$this->pages = $pages;
	}

	public function prepare(View $view, array $parameters)	
	{
		$category = $this->pages->where('title', 'job')->first();
		$posts = $this->posts->with('author')
		->where('published_at', '<', Carbon::now())
		->where('category_id', $category->id)
		->orderBy('published_at', 'desc')
		->paginate(10);
		$view->with('posts', $posts);
	}
}