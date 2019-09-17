<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Page;
use Config;
use Auth;
use Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostsController extends Controller
{

    protected $posts;
    protected $categories;

    function __construct(Post $posts, Page $categories)
    {
        $this->posts = $posts;
        $this->categories = $categories;
    }


    public function index()
    {
        $posts = $this->posts->with('author')->orderBy('updated_at', 'desc')->paginate(7);
        return view('backend.posts.index', compact('posts'));
    }

 
    public function create(Post $post)
    {
        $categories = $this->getCategories();
        $languages = Config::get('languages');
        return view('backend.posts.form', compact('post', 'categories', 'languages'));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->category_id = (int)$request->category_id;
        $post->author_id = env('APP_ENV') == 'testing' ? 1 : Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;

        if (empty($request->published_at)) {
            $post->published_at = null;
        }else{
            $post->published_at = $request->published_at;
        }

        $post->language = $request->language;

        $image = $request->file('image');    
        $filename = time().'-'.$image->getClientOriginalName();
        Image::make($image->getRealPath())->save(public_path('upload/posts/'.$filename));
        $post->image = $filename;
        $post->save();
        return redirect(route('posts.index'))->with('status', 'Post has been created!');
        
    }


    public function edit($id)
    {
        $post = $this->posts->findOrFail($id);
        $categories = $this->getCategories();
        $languages = Config::get('languages');
        return view('backend.posts.form', compact('post', 'categories', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->posts->findOrFail($id);
        
        $post->category_id = (int)$request->category_id;
        $post->author_id = env('APP_ENV') == 'testing' ? 1 : Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->language = $request->language;

        if (empty($request->published_at)) {
            $post->published_at = null;
        }else{
            $post->published_at = $request->published_at;
        }

        if ($request->hasFile('image')) {

            $image_old =$post->image;
            if ( $image_old != null) {
                unlink(public_path('upload/posts/'.$image_old));
            }
            $image = $request->file('image');    
            $filename = time().'-'.$image->getClientOriginalName();
            Image::make($image)->save(public_path('/upload/posts/'.$filename));
            $post->image = $filename;

        }
        $post->save();

        return redirect(route('posts.edit', $post->id))->with('status', 'Post has been updated!');

    }


    public function confirm($id)
    {
        $post = $this->posts->findOrFail($id);
        return view('backend.posts.confirm', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->posts->findOrFail($id);
        $image_old =$post->image;
            if ( $image_old != null) {
                unlink(public_path('upload/posts/'.$image_old));
            }
            
        $post->delete();

        return redirect(route('posts.index'))->with('status', 'Post has been deleted!');
    }

    public function getCategories()
    {
        $categories = $this->categories->where('hidden', false)->where('type', 'category')->orderBy('lft', 'asc')->get();
        
        return $categories;
    }
}
