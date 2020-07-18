<?php 

namespace App\Templates;

use Illuminate\View\View;
use App\Post;
use App\Page;
use App\Block;
use Carbon\Carbon;
use Lang;
use App\Slider;
use App\Product;
use Request;


class ProductTemplate extends AbstractTemplate
{
	protected $view = 'product';

	protected $posts; 
	protected $pages;
	protected $blocks;
	protected $sliders;

	protected $products;




	function __construct(Post $posts, Page $pages, Block $blocks, Slider $sliders, Product $products )
	{
		$this->posts = $posts;
		$this->pages = $pages;
		$this->blocks = $blocks;
		$this->sliders = $sliders;
		$this->products = $products;

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

		$latest_watches = $this->products->where('category_id', '11')->orderBy('created_at', 'desc')->paginate(6);
		
		$product_categories = $this->pages->where('type', 'ecommerce')->where('title', '!=', 'Latest Watches')->where('title', '!=', 'Best Product')->orderBy('created_at', 'desc')->paginate(6);

		$parameters =  Request::path();
		
		$category = $this->pages->where('uri', $parameters)->first();

		$products = $category->products->take(12);

		$view->with('posts', $posts)->with('pages', $pages)->with('postCategory', $postCategory)->with('blocks', $blocks)->with('sliders', $sliders)->with('latest_watches', $latest_watches)->with('product_categories', $product_categories)
			->with('products', $products)->with('parameters', $parameters);
	}
}