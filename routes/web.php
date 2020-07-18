<?php


Route::group(['middleware' => ['langChooser']], function () {

	Route::get('language/{type}', 'LanguageController@chooser');    
	Auth::routes();
	Route::get('register', 'Auth\LoginController@showLoginForm');
	Route::group(['namespace' => 'Backend'], function () {

		Route::get('dashboard', 'StaticController@dashboard')->name('dashboard');
		
		Route::resource('pages', 'PagesController', ['except'=>'show']); 
		Route::get('pages/{pages}/confirm', 'PagesController@confirm')->name('pages.confirm');

		Route::resource('categories', 'CategoriesController', ['except'=>'show']); 
		Route::get('categories/{categories}/confirm', 'CategoriesController@confirm')->name('categories.confirm');   
		
		// User Controller -->
		Route::get('users','UsersController@index')->name("users.index");
		Route::post('users/addUser', 'UsersController@addUser')->name("addUser");  
		Route::post('users/editUser', 'UsersController@editUser')->name("editUser");  
		Route::post('users/deleteUser', 'UsersController@deleteUser')->name("deleteUser");  
		Route::get('users/editProfile','UsersController@editProfile')->name('users.editProfile');
		Route::post('users/updateProfile','UsersController@updateProfile');
		

		Route::resource('posts', 'PostsController', ['except'=>'show']);
		Route::get('posts/{posts}/confirm', 'PostsController@confirm')->name('posts.confirm');

		Route::resource('comments', 'CommentsController', ['except'=>['create', 'store']]);
		Route::get('comments/{comments}/confirm', 'CommentsController@confirm')->name('comments.confirm');
		Route::put('comments/approved/{comments}', 'CommentsController@approved')->name('comments.approved');

		Route::resource('blocks', 'BlocksController', ['except'=>'show']);
		Route::get('blocks/{blocks}/confirm', 'BlocksController@confirm')->name('blocks.confirm');

		Route::resource('settings', 'GeneralSettingsController', ['only'=>['create', 'edit', 'store', 'update']]);
		Route::resource('sliders', 'SlidersController', ['except'=>'show']);
		Route::resource('feedbacks', 'FeedbacksController', ['only'=>['store', 'index', 'destroy']]);
		Route::get('settings', 'GeneralSettingsController@create')->name('settings');

		// eCommerce Route -->
		Route::resource('products','ProductsController');
		Route::get('products/{products}/confirm', 'ProductsController@confirm')->name('products.confirm');

		Route::resource('orders','OrdersController');
		Route::get('orders/{orders}/confirm', 'OrdersController@confirm')->name('orders.confirm');

		
		

	});
	Route::post('comments/', 'CommentsController@store')->name('comments.store');

	Route::post('order_product', 'OrderProductsController@store')->name('order_product');

	// Dynamic menu route
	if(Schema::hasTable('pages'))
	{
		foreach (App\Page::all() as $page) {
			Route::get($page->uri, ['as'=>$page->name, function() use($page){

				return $this->app->call('App\Http\Controllers\PageController@show', [
					'page' => $page,
					'parameters' => Route::current()->parameters()
					]);

			}]);               
		} 
	}

	if (env('APP_ENV') == 'testing') {
		Route::get('/blog/{id}/{slug}', 'PageController@show')->name('single-post');
	}
});
