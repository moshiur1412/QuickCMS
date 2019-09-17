<?php 

namespace App\Templates;

use Illuminate\View\View;
use App\Post;
use App\Page;
use App\Block;
use Carbon\Carbon;
use Lang;
use App\Slider;
/**
* 
*/
class HomeTemplate extends AbstractTemplate
{
	
	protected $view = 'home';

	protected $posts; 
	protected $pages;
	protected $blocks;
	protected $sliders;


	function __construct(Post $posts, Page $pages, Block $blocks, Slider $sliders)
	{
		$this->posts = $posts;
		$this->pages = $pages;
		$this->blocks = $blocks;
		$this->sliders = $sliders;
	}

	public function prepare(View $view, array $parameters)	
	{
		$posts = $this->posts->with('author')
		->where('published_at', '<', Carbon::now())
		->orderBy('published_at', 'desc')
		->get();

		
		$postCategory = $this->posts->with('author')
		->where('category_id', 6)
		->where('published_at', '<', Carbon::now())
		->orderBy('published_at', 'desc')
		->take(6)
		->get();

		$pages = $this->pages->where('hidden', false)->where('type', 'page')->where('language', Lang::getLocale())->get()->toHierarchy();

		$blocks = $this->blocks->where('published', true)->orderBy('order', 'asc')->get();
		
		$sliders = $this->sliders->where('published', true)->orderBy('order', 'asc')->get();

		$view->with('posts', $posts)->with('pages', $pages)->with('postCategory', $postCategory)->with('blocks', $blocks)->with('sliders', $sliders);
	}
}