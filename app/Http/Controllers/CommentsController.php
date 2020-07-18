<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use Redirect;


class CommentsController extends Controller
{
    
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->only('post_id', 'name', 'email', 'message'));

        return Redirect::back();
    }
}
