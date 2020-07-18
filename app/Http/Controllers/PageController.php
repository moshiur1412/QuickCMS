<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function show(Page $page, array $parameters)
    {
    	$this->prepareTemplate($page, $parameters);

    	return view('page', compact('page'));
    }

    protected function prepareTemplate(Page $page, array $parameters)
    {
    	
    	// Grub the list of templates from cms.templates array
    	$templates = config('cms.templates');

    	if (! $page->template || ! isset($templates[$page->template])) {
    		return;
    	}

    	// grub the specific template for a page from the array of templates
    	$template = app($templates[$page->template]);

    	// get the view in the templates directory
    	$view = sprintf('templates.%s', $template->getView());

    	// kill the view if it doesn't exist
    	if (! view()->exists($view)) {
    		return;
    	}

    	// Call prepare method of the template
    	$template->prepare($view = view($view), $parameters);

    	// set property view in the page instance
    	$page->view = $view;
    }
}
