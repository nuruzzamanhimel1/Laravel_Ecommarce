<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|222222
*/

// Show home page Products...............
Route::get('/','frontend\PageController@index_method')->name('index');
Route::get('/contuct','frontend\PageController@contuct_method')->name('contuct');
Route::get('/search','frontend\PageController@search')->name('search');

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
show all the products in the userpanel
|
*/
Route::group(['prefix' => 'products'],function(){

	Route::get('/','frontend\ProductsController@index')->name('products');
	Route::get('/{slug}','frontend\ProductsController@show')->name('products.shows');


	// ............... Categories .......................
	Route::get('/categories','frontend\CategoriesController@index')->name('categories.index');
	Route::get('/category/{id}','frontend\CategoriesController@show')->name('categories.show');



});


// User Verification...........
Route::group(['prefix' => 'user'],function(){

	Route::get('/tokern/{tokern}','frontend\VerrificationController@verify')->name('user.varification');
	Route::get('/dashboard','frontend\UserController@dashboard')->name('user.dashboard');
	Route::get('/profile','frontend\UserController@profile')->name('user.profile');

	Route::post('/profile/update','frontend\UserController@profileUpdate')->name('user.profile.update');

	});


// Cards controller
Route::group(['prefix' => 'carts'],function(){

	Route::get('/','frontend\CartsController@index')->name('carts');

	Route::post('/s
		tore','frontend\CartsController@store')->name('cart.store');
	Route::post('/update/{id}','frontend\CartsController@update')->name('card.update');
	Route::post('/delete/{id}','frontend\CartsController@destroy')->name('card.delete');

	});

// Cards controller
Route::group(['prefix' => 'checkouts'],function(){

	Route::get('/','frontend\CheckoutsController@index')->name('checkouts');

	Route::post('/store','frontend\CheckoutsController@store')->name('checkouts.store');
	

	});



// ................ Admin .................
Route::group(['prefix' => 'admin'],function(){
	
	Route::get('/','backend\AdminPageController@index_method')->name('admin.index');

	// ************* Admin Login Routes ************
	Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');

	Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
	
	Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');
	
	//  password Email send......
	Route::get('/password/reset','Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

	Route::post('/password/email','Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	//  password Rest......
	Route::get('/password/reset/{token}','Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::post('/password/update/reset','Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');




	// **************** end ***************


	Route::group(['prefix' => '/products'],function(){

		Route::get('/create','backend\AdminProductController@create')->name('admin.product.create');

		Route::get('/list','backend\AdminProductController@list')->name('admin.products.list');

		Route::get('/edit/{id}','backend\AdminProductController@edit')->name('admin.product.edit');

	// .......................................... 
		
		Route::post('/update/{id}','backend\AdminProductController@update')->name('admin.product.update');

		Route::post('/store','backend\AdminProductController@store')->name('admin.product.store');

		Route::post('/delete/{id}','backend\AdminProductController@delete')->name('admin.product.delete');

	});

	// ........... Ouder Route.........................

	Route::group(['prefix' => '/orders'],function(){

		Route::get('/','backend\AdminOrdersController@index')->name('admin.orders');

		Route::get('/view/{id}','backend\AdminOrdersController@show')->name('admin.order.view');

		Route::post('/delete/{id}','backend\AdminOrdersController@delete')->name('admin.order.delete');

		Route::post('/colpleted/{id}','backend\AdminOrdersController@completed')->name('admin.order.completed');

		Route::post('/paid/{id}','backend\AdminOrdersController@paid')->name('admin.order.paid');

		Route::post('/charge-update/{id}','backend\AdminOrdersController@chargeUpdate')->name('admin.order.charge');
		// ************ PDF Generate *****************
		Route::get('/invoice/{id}','backend\AdminOrdersController@invoice')->name('admin.order.invoice');

	});

		// ........... Sliders Route.........................

	Route::group(['prefix' => '/sliders'],function(){

		Route::get('/','backend\AdminSliderController@index')->name('admin.slider');

		Route::post('/store','backend\AdminSliderController@store')->name('admin.slider.store');

		Route::post('/slider/edit/{id}','backend\AdminSliderController@update')->name('admin.slider.edit');

		Route::post('/slider/delete/{id}','backend\AdminSliderController@delete')->name('admin.slider.delete');

	});

// ..... categories routes.......................

	Route::group(['prefix' => '/categories'],function(){

		Route::get('/','backend\AdminCategoriesController@index_method')->name('admin.categories');

		Route::get('/create','backend\AdminCategoriesController@create')->name('admin.categories.create');

		// Route::get('/list','backend\AdminCategoriesController@list')->name('admin.categories.list');

		Route::get('/edit/{id}','backend\AdminCategoriesController@edit')->name('admin.categories.edit');

	// .......................................... 
		
		Route::post('/update/{id}','backend\AdminCategoriesController@update')->name('admin.categories.update');

		Route::post('/store','backend\AdminCategoriesController@store')->name('admin.categories.store');

		Route::post('/delete/{id}','backend\AdminCategoriesController@delete')->name('admin.categories.delete');

	});

// ............ Brands Route Created .................

	Route::group(['prefix' => '/brands'],function(){

		// .................... Get Routes....................
		Route::get('/','backend\AdminBrandsController@index_method')->name('admin.brands');

		Route::get('/create','backend\AdminBrandsController@create')->name('admin.brands.create');
			Route::get('/edit/{id}','backend\AdminBrandsController@edit')->name('admin.brands.edit');

		// .................... Post Routes .......................
		Route::post('/store','backend\AdminBrandsController@store')->name('admin.brands.store');
		Route::post('/update/{id}','backend\AdminBrandsController@update')->name('admin.brands.update');
		Route::post('/delete/{id}','backend\AdminBrandsController@delete')->name('admin.brands.delete');

	});
	// ................. divisions Route Create .....................
	Route::group(['prefix' => '/divisions'],function(){
		// .................... Get Routes....................
		Route::get('/','backend\AdminDivisionsController@index_method')->name('admin.divisions');
		
		Route::get('/create','backend\AdminDivisionsController@create')->name('admin.division.create');
		Route::get('/edit/{id}','backend\AdminDivisionsController@edit')->name('admin.division.edit');


		// .................... Post Routes .......................
		Route::post('/store','backend\AdminDivisionsController@store')->name('admin.division.store');
		Route::post('/update/{id}','backend\AdminDivisionsController@update')->name('admin.division.update');

		Route::post('/delete/{id}','backend\AdminDivisionsController@delete')->name('admin.division.delete');
		
	});




	// ................. divisions Route Create .....................
	Route::group(['prefix' => '/districts'],function(){
		// .................... Get Routes....................
		Route::get('/','backend\AdminDistrictsController@index_method')->name('admin.district');
		
		Route::get('/create','backend\AdminDistrictsController@create')->name('admin.district.create');
		Route::get('/edit/{id}','backend\AdminDistrictsController@edit')->name('admin.district.edit');
		// .................... Post Routes .......................
		Route::post('/store','backend\AdminDistrictsController@store')->name('admin.district.store');
		Route::post('/update/{id}','backend\AdminDistrictsController@update')->name('admin.district.update');

		Route::post('/delete/{id}','backend\AdminDistrictsController@delete')->name('admin.district.delete');
		
	});

	
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
