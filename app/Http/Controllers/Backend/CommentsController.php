<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Comment;


class CommentsController extends Controller
{
	protected $comments;

    function __construct(Comment $comments)
    {
    	$this->comments = $comments;

    	Parent::__construct();
    }

    public function index()
    {
    	$comments = $this->comments->with('post')->orderBy('created_at', 'desc')->paginate(25);
    	return view('backend.comments.index', compact('comments'));
    }

    public function edit($id)
    {
    	$comment = $this->comments->findOrFail($id);

    	return view('backend.comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
    	$comment = $this->comments->findOrFail($id);

    	$comment->fill($request->only('name', 'email', 'message'))->save();
    	return redirect(route('comments.edit', $comment->id))->with('status', 'Comments has been update!');
    }

    public function approved(Request $request, $id)		
    {
    	$comment = $this->comments->findOrFail($id);

        $comment->name = $comment->name;
        $comment->email = $comment->email;
        $comment->message = $comment->message;

        $comment->approved = $request->approved;
        // $comment->fill($request->only('approved'))->save();

        $comment->save();

        return redirect(route('comments.index'));
    }

    public function confirm($id)
    {
        $comment = $this->comments->findOrFail($id);
        return view('backend.comments.confirm', compact('comment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->comments->findOrFail($id);
        

        $comment->delete();

        return redirect(route('comments.index'))->with('status', 'Comment has been deleted!');
    }

}
