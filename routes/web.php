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

// Route::get('/', function () {
// 	//echo 123;
// 	$name ='谢观政,优秀';
//     return view('welcome',['name'=>$name]);
// });
Route::get('/', 'Index\IndexController@index');
Route::view('/login', 'index.login');
//发送短信
Route::get('/sendsms','Index\LoginController@sendSms');
Route::get('/reg', 'index\LoginController@reg');
Route::get('/send','Index\LoginController@ajaxsend');
Route::post('/regdo','Index\LoginController@regdo');
Route::get('login','LoginController@list');
//列表
 Route::get('/prolist','Index\ProlistController@list');
 //详情
 Route::get('/proinfo{id}','Index\GoodsController@proinfo');

 






//外来务工人员统计
Route::prefix('people')->middleware('checklogin')->group(function(){
	Route::get('create','PeopleController@create');
	Route::post('store','PeopleController@store');
	Route::get('/','PeopleController@index');
	Route::get('edit/{id}','PeopleController@edit');
	Route::post('update/{id}','PeopleController@update');
	Route::get('destroy/{id}','PeopleController@destroy');
});
// Route::view('/login','login');
// Route::post('/logindo','LoginController@logindo');
//学生

 Route::get('student/create','StudentController@create');

 Route::post('student/store','StudentController@store');

 Route::get('student','StudentController@index');

 Route::get('student/edit/{id}','StudentController@edit');

 Route::post('student/update/{id}','StudentController@update');

 Route::get('student/destroy/{id}','StudentController@destroy');


// //商品
Route::get('commodity/create','CommodityController@create');

Route::post('commodity/store','CommodityController@store');

Route::get('commodity','CommodityController@index');

Route::get('commodity/edit/{id}','CommodityController@edit');

Route::post('commodity/update/{id}','CommodityController@update');

Route::get('commodity/destroy/{id}','CommodityController@destroy');



//文章
Route::get('article/create','ArticleController@create');

Route::post('article/store','ArticleController@store');

Route::get('article','ArticleController@index');

Route::get('article/edit/{id}','ArticleController@edit');

Route::post('article/update/{id}','ArticleController@update');

Route::get('article/destroy/{id}','ArticleController@destroy');

// Route::post('article/checkOnly','ArticleController@checkOnly');
//练习
Route::get('/news','NewsController@index');
Route::get('/news/create','NewsController@create');
Route::post('/news/store','NewsController@store');
Route::get('/news/chekcOnly','NewsController@chekcOnly');
Route::get('/news/edit/{id}','NewsController@edit');
Route::post('/news/update/{id}','NewsController@update');
Route::get('/news/destory/{id}','NewsController@destroy');
//商品分类
Route::get('/category','CategoryController@index');
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
//商品管理
Route::get('/mercha','MerchaController@index');
Route::get('/mercha/create','MerchaController@create');

Route::post('/mercha/store','MerchaController@store');
//Route::get('/mercha/chekcOnly','NewsController@chekcOnly');
Route::get('/mercha/edit/{id}','MerchaController@edit');
Route::post('/mercha/update/{id}','MerchaController@update');
Route::get('/mercha/destory/{id}','MerchaController@destroy');
//商品类型
Route::get('/goods/create','GoodsController@create');
Route::post('/goods/store','GoodsController@store');
Route::get('/goods','GoodsController@index');
//管理员
Route::get('admin/create','AdminController@create');

Route::post('admin/store','AdminController@store');

Route::get('admin','AdminController@index');

Route::get('admin/edit/{id}','AdminController@edit');

Route::post('admin/update/{id}','AdminController@update');

Route::get('admin/destroy/{id}','AdminController@destroy');
//主管
Route::get('usrent/create','UsrentController@create');

Route::post('usrent/store','UsrentController@store');
Route::get('usrent','UsrentController@index');
Route::get('usrent/edit/{id}','UsrentController@edit');

 Route::post('usrent/update/{id}','UsrentController@update');

 Route::get('usrent/destroy/{id}','UsrentController@destroy');

 //  Route::view('/login','login');
 // Route::post('/logindo','LoginController@logindo');