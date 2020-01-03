<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// To Call the Home Page
Route::get('/', 'Frontend\PagesController@index')->name('index');
// To Call the Login Page
Route::get('/login', 'Frontend\PagesController@login')->name('login');
// To Call the Register Page
Route::get('/register', 'Frontend\PagesController@register')->name('register');


Route::group(['namespace'=>'Frontend'], function () {
    Route::group(['prefix' => 'products/'], function () {
        // To Call the Product Page
        Route::get('/', 'ProductsController@products')->name('products');
        Route::get('/{slug}', 'ProductsController@show')->name('products.show');
        Route::get('/new/search','PagesController@search')->name('search');
        // Single (Parent/Child) Category Page View
        Route::get('/category/{id}', 'CategoryController@show')->name('categories.show');
    });
    Route::group(['prefix' => 'carts/'], function () {
        Route::get('/', 'CartController@index')->name('carts');
        Route::post('/store','CartController@store')->name('carts.store');    
        Route::post('/update/{id}','CartController@update')->name('carts.update');    
        Route::post('/delete/{id}','CartController@delete')->name('carts.delete');    
    });
    Route::group(['prefix' => 'checkout/'], function () {
        Route::get('/', 'CheckoutController@index')->name('checkouts');
        Route::post('/store','CheckoutController@store')->name('checkouts.store');    
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/token/{token}', 'VerificationController@varify')->name('user.verification');

        Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::post('/profile/update', 'UserController@profile_update')->name('user.profile.update');
    });
});


#--------------------------Backend----------------------

Route::group(['prefix' => 'admin','namespace'=>'Backend'], function () {
    Route::get('/dashboard','PagesController@dashboard')->name('dashboard');

    Route::group(['prefix' => '/categories'], function () {  //Convert these into Category Controller
        Route::get('/createCategories','CategoryController@create_category')->name('createCategory');
        Route::post('/storeCategories','CategoryController@store_category')->name('admin.Categories.storeCategory');
        Route::get('/manageCategory','CategoryController@manage_category')->name('manageCategory');
        Route::get('/edit/{id}','CategoryController@edit_category')->name('editCategory');
        Route::post('/edit/{id}','CategoryController@upadte_category')->name('updateCategory');
        Route::post('/delete/{id}','CategoryController@delete_category')->name('deleteCategory');
    });

    // Route::group(['prefix' => '/product'], function () { //Convert these into Product Controller
    //     Route::get('/addProduct','PagesController@addProduct')->name('admin.product.addProduct');
    //     Route::post('/storeProduct','PagesController@product_store')->name('admin.product.storeProduct');
    //     Route::get('/manage','PagesController@manage_product')->name('admin.product.manageProduct');
    //     Route::get('/edit/{id}','PagesController@edit_product')->name('editProduct');
    //     Route::post('/edit/{id}','PagesController@upadte_product')->name('updateProduct');
    //     Route::post('/delete/{id}','PagesController@delete_product')->name('deleteProduct');
    // });
    Route::group(['prefix' => '/product'], function () { //Convert these into Product Controller
        Route::get('/addProduct','ProductController@addProduct')->name('admin.product.addProduct');
        Route::post('/storeProduct','ProductController@product_store')->name('admin.product.storeProduct');
        Route::get('/manage','ProductController@manage_product')->name('admin.product.manageProduct');
        Route::get('/edit/{id}','ProductController@edit_product')->name('editProduct');
        Route::post('/edit/{id}','ProductController@upadte_product')->name('updateProduct');
        Route::post('/delete/{id}','ProductController@delete_product')->name('deleteProduct');
    });

    Route::group(['prefix' => '/brands'], function () { 
        Route::get('/','BrandController@index')->name('admin.brand');
        Route::get('/create','BrandController@create')->name('admin.brand.create');
        Route::post('/store','BrandController@store')->name('admin.brand.store');
        Route::get('/edit/{id}','BrandController@edit')->name('admin.brand.edit');
        Route::post('/edit/{id}','BrandController@upadte')->name('admin.brand.update');
        Route::post('/delete/{id}','BrandController@delete')->name('admin.brand.delete');
    });

    Route::group(['prefix' => '/divisions'], function () { 
        Route::get('/','DivisionController@index')->name('admin.divisions');
        Route::get('/create','DivisionController@create')->name('admin.divisions.create');
        Route::post('/store','DivisionController@store')->name('admin.divisions.store');
        Route::get('/edit/{id}','DivisionController@edit')->name('admin.divisions.edit');
        Route::post('/edit/{id}','DivisionController@update')->name('admin.divisions.update');
        Route::post('/delete/{id}','DivisionController@delete')->name('admin.divisions.delete');
    });    
    
    Route::group(['prefix' => '/districts'], function () { 
        Route::get('/','DistrictController@index')->name('admin.districts');
        Route::get('/create','DistrictController@create')->name('admin.districts.create');
        Route::post('/store','DistrictController@store')->name('admin.districts.store');
        Route::get('/edit/{id}','DistrictController@edit')->name('admin.districts.edit');
        Route::post('/edit/{id}','DistrictController@update')->name('admin.districts.update');
        Route::post('/delete/{id}','DistrictController@delete')->name('admin.districts.delete');
    });    
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('get-districts/{id}',function($id){
    return json_encode(App\Models\District::where('division_id',$id)->get());
});