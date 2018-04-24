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

Route::get('/',['as'=>'trang-chu','uses'=>'PageController@getIndex']);

Route::get('index',['as'=>'trang-chu','uses'=>'PageController@getIndex']);

Route::get('loai-sanpham/{type}.html',['as'=>'loaisanpham','uses'=>'PageController@getLoaiSp']);

Route::get('product/{id}.html',['as'=>'sanpham','uses'=>'PageController@getProduct']);

Route::get('contact',['as'=>'contact','uses'=>'PageController@getContact']);

Route::get('about',['as'=>'about','uses'=>'PageController@getAbout']);

Route::get('add-cart/{id}',['as'=>'addcart','uses'=>'PageController@getAddtoCart']);

Route::get('del-cart/{id}',['as'=>'deletecart','uses'=>'PageController@getDeleteCart']);

Route::get('dat-hang',['as'=>'dathang','uses'=>'PageController@getCheckout']);

Route::post('dat-hang',['as'=>'dathang','uses'=>'PageController@postCheckout']);

Route::get('login',['as'=>'login','uses'=>'PageController@getLogin']);

Route::post('login',['as'=>'login','uses'=>'PageController@postLogin']);

Route::get('signup',['as'=>'signup','uses'=>'PageController@getSignup']);

Route::post('signup',['as'=>'signup','uses'=>'PageController@postSignup']);

Route::get('logout',['as'=>'logout','uses'=>'PageController@getLogout']);

Route::get('test',['as'=>'test','uses'=>'PageController@getTest']);

Route::get('edit/{id}',['as'=>'edit','uses'=>'PageController@getEditUser']);

Route::post('edit/{id}',['as'=>'edit','uses'=>'PageController@postEditUser']);

Route::get('admin/pages/login',['as'=>'admin.pages.getLogin','uses'=>'UserController@getLogin']);

Route::post('admin/pages/login',['as'=>'admin.pages.postLogin','uses'=>'UserController@postLogin']);
Route::get('user-block',['as'=>'getBlockUser','uses'=>'PageController@getBlockUser']);

Route::get('admin/pages/logout',['as'=>'admin.pages.getLogout','uses'=>'UserController@getLogout']);

Route::group(['prefix'=>'admin','middleware'=>'CheckLevel'],function(){
	Route::group(['prefix'=>'pages'],function(){
		Route::get('survey',['as'=>'admin.pages.survey','uses'=>'HomeController@survey']);
		Route::get('survey/chart',['as'=>'admin.pages.chart','uses'=>'HomeController@chart']);
		Route::get('tables',['as'=>'admin.pages.tables','uses'=>'HomeController@table']);
		Route::get('form',['as'=>'admin.pages.form','uses'=>'HomeController@form']);
		Route::get('calendar',['as'=>'admin.pages.calendar','uses'=>'HomeController@calendar']);
	});
	Route::group(['prefix'=>'cats'],function(){
		Route::get('list',['as'=>'admin.cats.getList','uses'=>'CatController@getList']);
		Route::get('add',['as'=>'admin.cats.getAdd','uses'=>'CatController@getAdd']);
		Route::post('add',['as'=>'admin.cats.postAdd','uses'=>'CatController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.cats.getEdit','uses'=>'CatController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cats.postEdit','uses'=>'CatController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.cats.getDelete','uses'=>'CatController@getDelete']);
	});
	Route::group(['prefix'=>'products'],function(){
		Route::get('add',['as'=>'admin.products.getAdd','uses'=>'BookController@getAdd']);
		Route::post('add',['as'=>'admin.products.postAdd','uses'=>'BookController@postAdd']);
		Route::get('list',['as'=>'admin.products.getList','uses'=>'BookController@getList']);
		Route::get('delete/{id}',['as'=>'admin.products.getDelete','uses'=>'BookController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.products.getEdit','uses'=>'BookController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.products.postEdit','uses'=>'BookController@postEdit']);
		Route::get('detail/{id}',['as'=>'admin.products.getDetail','uses'=>'BookController@getDetail']);
		Route::get('delimg/{id}',['as'=>'admin.products.getDelImg','uses'=>'BookController@getDelImg']);
	});
	Route::group(['prefix'=>'users'],function(){
		Route::get('add',['as'=>'admin.users.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.users.postAdd','uses'=>'UserController@postAdd']);
		Route::get('list',['as'=>'admin.users.getList','uses'=>'UserController@getList']);
		Route::get('edit/{id}',['as'=>'admin.users.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.users.postEdit','uses'=>'UserController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.users.getDelete','uses'=>'UserController@getDelete']);
		Route::get('detail/{id}',['as'=>'admin.users.getDetail','uses'=>'UserController@getDetail']);
	});
	Route::group(['prefix'=>'bills'],function(){
		Route::get('list',['as'=>'admin.bills.getList','uses'=>'BillController@getList']);
		Route::get('edit/{id}',['as'=>'admin.bills.getEdit','uses'=>'BillController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.bills.postEdit','uses'=>'BillController@postEdit']);
		Route::get('detail/{id}',['as'=>'admin.bills.getDetail','uses'=>'BillController@getDetail']);
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('add',['as'=>'admin.slide.getAdd','uses'=>'SlideController@getAdd']);
		Route::post('add',['as'=>'admin.slide.postAdd','uses'=>'SlideController@postAdd']);
		Route::get('list',['as'=>'admin.slide.getList','uses'=>'SlideController@getList']);
		Route::get('delete/{id}',['as'=>'admin.slide.getDelete','uses'=>'SlideController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.slide.getEdit','uses'=>'SlideController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.slide.postEdit','uses'=>'SlideController@postEdit']);
	});
});