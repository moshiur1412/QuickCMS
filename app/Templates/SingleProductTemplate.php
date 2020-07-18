<?php 

namespace App\Templates;

use Illuminate\View\View;
use App\Product;
use Carbon\Carbon;
use App\Comment;
/**
* 
*/
class SingleProductTemplate extends AbstractTemplate
{
	
	protected $view = 'single_product';

	protected $products;

	function __construct(Product $products)
	{
		$this->products = $products;
	}

	public function prepare(View $view, array $parameters)	
	{
		$product = $this->products->where('id', $parameters['id'])->first();
		
		$view->with('product', $product);
	}
}