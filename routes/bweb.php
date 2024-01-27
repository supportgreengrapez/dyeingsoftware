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



Route::get('/','clientController@home');
Route::get('/how-it-works',function()
{
   return view('how_it_works'); 
});

Route::get('/support',function()
{
   return view('support'); 
});


Route::get('/pricing-and-plan',function()
{
   return view('price_plan'); 
});

Route::get('/home',function()
{
   return view('index'); 
});

/*

----- CLIENT -----

*/

Route::get('/login','clientController@login_view');
Route::get('/register','clientController@register_view');
Route::post('/login','clientController@login');
Route::post('/register','clientController@register');
Route::get('/logout','clientController@logout');
Route::get('/dashboard','clientController@dashboard');
Route::get('/manage-users','clientController@manage_users_view');
Route::get('/create-users','clientController@create_users_view');
Route::post('/create-users','clientController@create_users');
Route::get('/records-view','clientController@records_view');
Route::get('/add-record','clientController@add_record_view');
Route::post('/add-record','clientController@add_record');

Route::get('/view-record/{id}','clientController@specific_view_record');

Route::get('/edit-record/{id}','clientController@eidt_record_view');
Route::post('/edit-record/{id}','clientController@edit_record');
Route::get('/view-record/{id}','clientController@specific_view_record');

Route::get('/delete-record/{id}','clientController@delete_record');

Route::get('/edit-user/{id}','clientController@edit_user_view');
Route::post('/edit-user/{id}','clientController@edit_user');
Route::get('/delete-user/{id}','clientController@delete_user');

