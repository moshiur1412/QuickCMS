<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;

class LanguageController extends Controller
{
	
    public function chooser($value)
    {
    	Session::set('locale', $value);
    	return Redirect::back();
    }
}
