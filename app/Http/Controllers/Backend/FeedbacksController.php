<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Feedback;
use Redirect;

class FeedbacksController extends Controller
{
	protected $feedbacks;

	function __construct(Feedback $feedbacks)
	{
		$this->feedbacks = $feedbacks;
	}

	public function index()
	{
		$feedbacks = $this->feedbacks->all();

		return view('backend.feedback.index', compact('feedbacks'));
	}

    public function store(Request $request)
    {
    	$feedback = $this->feedbacks->create($request->only('name', 'email', 'subject', 'message'));

    	return Redirect::back();
    }

    public function destroy($id)
    {
    	$feedback = $this->feedbacks->findOrFail($id);

    	$feedback->delete();

    	return redirect(route('feedbacks.index'));
    }
}
