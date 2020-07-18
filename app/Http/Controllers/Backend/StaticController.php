<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Page;
use App\Comment;
use Carbon\Carbon;
use DB;
class StaticController extends Controller
{
	public function dashboard(Post $posts, User $users, Page $pages, Comment $comments)
	{
		$posts = $posts->orderBy('created_at', 'desc')->where('published_at', '<', Carbon::now())->take(6)->get();

		$users = $users->whereNotNull('last_login_at')->orderBy('last_login_at', 'desc')->take(4)->get();

		$comments = $comments->orderBy('created_at','desc')->take(4)->get();

		// $countComments = $comments->select('id')->groupBy('post_id')->get();

		$countUsers = count(User::all());;
		$countPosts = count(Post::all());
		$countPages = count(Page::all());


		$countComments = DB::table('comments')->distinct()->count('post_id');
		

		$percentComments = $countPosts>0 ? (($countComments*100)/$countPosts) : 0;

		return view('backend.static.dashboard', compact('posts', 'users', 'comments','countUsers','countPosts','countPages','percentComments'));
	}
}
