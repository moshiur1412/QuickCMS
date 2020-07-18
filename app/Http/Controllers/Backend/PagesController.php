<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Page;
use Lang;
use Config;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Baum\MoveNotPossibleException;


class PagesController extends Controller
{

    protected $pages;

    function __construct(Page $pages)
    {
        $this->pages = $pages;
        Parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pages->where('type', 'page')->orderBy('updated_at', 'desc')->paginate(7);
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        $templates = $this->getPageTemplates();
        $orderPages = $this->pages->where('hidden', false)->where('type', 'page')->orderBy('lft', 'asc')->get();
        $languages = Config::get('languages');

        return view('backend.pages.form', compact('page', 'templates', 'orderPages', 'languages'));
    }

 
    public function store(StorePageRequest $request)
    {
        $page = $this->pages->create($request->only('title', 'uri', 'type', 'name', 'content', 'language', 'template', 'hidden'));

        $this->updatePageOrder($page, $request);

        return redirect(route('pages.index'))->with('status', 'Page has been created!');
    }


    public function edit($id)
    {
        $page = $this->pages->findOrFail($id);
        $templates = $this->getPageTemplates();

        $orderPages = $this->pages->where('hidden', false)->where('type', 'page')->orderBy('lft', 'asc')->get();
        $languages = Config::get('languages');

        return view('backend.pages.form', compact('page', 'templates', 'orderPages', 'languages'));
    }

   
    public function update(UpdatePageRequest $request, $id)
    {
        $page = $this->pages->findOrFail($id);
        
        if ($response=$this->updatePageOrder($page, $request)) {
            return $response;
        }
        
        $page->fill($request->only('title', 'uri', 'name', 'type', 'content', 'language', 'template', 'hidden'))->save();

        return redirect(route('pages.edit', $page->id))->with('status', 'Page has been updated!');
    }


    public function confirm($id)
    {
        $page = $this->pages->findOrFail($id);
        return view('backend.pages.confirm', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);
        
        foreach ($page->children as $child) {
            $child->makeRoot();
        }

        $page->delete();

        return redirect(route('pages.index'))->with('status', 'Page has been deleted!');
    }

    protected function getPageTemplates()
    {
        $templates = config('cms.templates');

        return [''=>''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updatePageOrder(Page $page, Request $request)
    {
        if ($request->has('order', 'orderPage')) {
            try {
                $page->updateOrder($request->input('order'), $request->input('orderPage'));
            } catch (MoveNotPossibleException $e) {
                return redirect(route('pages.edit', $page->id))->withInput()->withErrors([
                    'error' => 'Cannot make a page a child of itself!'
                ]);
            }
        }
    }
}
