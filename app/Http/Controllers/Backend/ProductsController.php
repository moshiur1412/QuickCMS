<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Page;
use Image;
use URL;
use File;
use App\Http\Requests\StoreProductsRequest;

class ProductsController extends Controller
{


    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(3);
        return view('backend.products.index', compact('products'));
    }

    
    public function create(Product $product)
    {
        $categories = Page::where('type','ecommerce')->get();
        return view('backend.products.form',compact('product','categories'));



    }


    public function store(StoreProductsRequest $request)
    {
       $products = new Product();
       $products->name = $request->name;
       $products->price = $request->price;
       if ($request->hasFile('image')) {

        $image = $request->file('image');    
        $filename = time().'_'.$image->getClientOriginalName();
        Image::make($image)->save(public_path('/upload/products/'.$filename));
        $products->image = $filename;

    }
    $products->description = $request->description;
    $products->category_id = $request->category_id;
    $products->save();
    return redirect(route('products.index'));

}


public function show($id)
{
        //
}


public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Page::where('type','ecommerce')->get();
    return view('backend.products.form',compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $products = Product::findOrFail($id);
    $products->name = $request->name;
    $products->price = $request->price;
    if ($request->hasFile('image')) {

       $old_img =$products->image;
       if ( $old_img != null) {
        unlink(public_path('/upload/products/'.$old_img));
    }
    $image = $request->file('image');    
    $filename = time().'-'.$image->getClientOriginalName();
    Image::make($image)->save(public_path('/upload/products/'.$filename));
    $products->image = $filename;

}
$products->description = $request->description;
$products->category_id = $request->category_id;
$products->save();
return redirect(route('products.index'));
}

public function confirm($id)
{
    $product = Product::findOrFail($id);

    return view('backend.products.confirm', compact('product'));
}


public function destroy($id)
{
    $products = Product::findOrFail($id);
     $image_old =$products->image;
            if ( $image_old != null) {
                unlink(public_path('upload/products/'.$image_old));
            }

    $products->delete();

    return redirect(route('products.index'));
}
}
