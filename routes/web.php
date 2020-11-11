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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','role_auth']], function () {
	Route::get('/userslist', 'UserController@index')->name('userslist');
	Route::get('/adduser', 'UserController@adduser')->name('adduser');
	Route::post('/adduser', 'UserController@creatuser')->name('createuser');
	Route::post('/edituser', 'UserController@edit')->name('edituser');
	Route::post('/deleteuser', 'UserController@delete')->name('deleteuser');
	Route::get('/roles', 'rolemanagementController@index')->name('rolemanagement');
	Route::get('/role/{id}', 'rolemanagementController@roledetails')->name('rolepermissrionlist');
	Route::post('/changepermission', 'rolemanagementController@changepermission')->name('changepermission');
});