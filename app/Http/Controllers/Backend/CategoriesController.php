<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Page;
use Lang;
use Config;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Baum\MoveNotPossibleException;


class CategoriesController extends Controller
{

    protected $categories;

    function __construct(Page $categories)
    {
        $this->categories = $categories;
    }
 
    public function index()
    {
        $categories = $this->categories->where('type', 'category')->orWhere('type', 'ecommerce')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

   
    public function create(Page $category)
    {
        $templates = $this->getCategoryTemplates();
        $orderCategories = $this->categories->where('hidden', false)->where('type', 'category')->orderBy('lft', 'asc')->get();
        $languages = Config::get('languages');
        return view('backend.categories.form', compact('category', 'templates', 'orderCategories', 'languages'));
    }

 
    public function store(StorePageRequest $request)
    {
        $category = Page::create($request->only('title', 'uri', 'type', 'name', 'content', 'language', 'template', 'hidden'));
        $this->updateCategoryOrder($category, $request);
        return redirect(route('categories.index'))->with('status', 'Category has been created!');
    }

    


    public function edit($id)
    {
        $category = $this->categories->findOrFail($id);
        $templates = $this->getCategoryTemplates();

        $orderCategories = $this->categories->where('hidden', false)->where('type', 'category')->orderBy('lft', 'asc')->get();
        $languages = Config::get('languages');

        return view('backend.categories.form', compact('category', 'templates', 'orderCategories', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categories->findOrFail($id);
        
        if ($response=$this->updateCategoryOrder($category, $request)) {
            return $response;
        }
        
        $category->fill($request->only('title', 'uri', 'name', 'type', 'content', 'language', 'template', 'hidden'))->save();

        return redirect(route('categories.edit', $category->id))->with('status', 'Category has been updated!');
    }


    public function confirm($id)
    {
        $category = $this->categories->findOrFail($id);
        return view('backend.categories.confirm', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categories->findOrFail($id);
        
        foreach ($category->children as $child) {
            $child->makeRoot();
        }

        $category->delete();

        return redirect(route('categories.index'))->with('status', 'Category has been deleted!');
    }

    protected function getCategoryTemplates()
    {
        $templates = config('cms.templates');

        return [''=>''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updateCategoryOrder(Page $category, Request $request)
    {
        if ($request->has('order', 'orderCategory')) {
            try {
                $category->updateOrder($request->input('order'), $request->input('orderCategory'));
            } catch (MoveNotPossibleException $e) {
                return redirect(route('categories.edit', $category->id))->withInput()->withErrors([
                    'error' => 'Cannot make a category a child of itself!'
                ]);
            }
        }
    }
}
