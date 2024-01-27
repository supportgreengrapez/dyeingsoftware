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

Route::get('biltyrecords-report','clientController@reports');

Route::get('/view-subscription','clientController@view_subscription');

Route::get('paypal/create-plan/{plan}','PayPalController@create_plan');

Route::get('/paypal/execute/agreement/{type}/{plan?}','PayPalController@execute_plan');

Route::get('/paypal/cancel/agreement/{id}','PayPalController@cancel_agreement');

Route::get('/get/p','PayPalController@getAgreement');

Route::get('/cancel-agreement/{id}','PayPalController@cancel_agreement');

Route::post('/cancel/webhook','PayPalController@webhook');

Route::post('paypal-complete-payment-webhook','PayPalController@complete_payment_webhook');

Route::get('profile-edit','clientController@profile_edit_view');
Route::post('profile/edit','clientController@profile_edit');

/*

    Admin Controller

*/

Route::get('admin','adminController@login_view');
Route::post('/admin-login','adminController@login');

Route::get('/admin-dashboard','adminController@dashboard');

Route::get('/admin-view-users','adminController@view_user_list');

Route::get('/admin-user-detail/{id}','adminController@user_detail');

Route::get('admin-logout','adminController@logout');





Route::get('/ssendmail',function(Request $request)
{
Log::info("asd");
//$json = $request->input('id');
//DB::insert("insert into pwebhook (wid,status,text) values('1','2','$json')");


 $data = array(
    'name' => "Nouman Shoaib",
    'firstname'=> "nice",
);
    Mail::send('test', $data, function ($message) {

        $message->from('no-reply@biltybooks.com', 'test');

        $message->to('nouman.shoaib786@gmail.com')->subject('Learning Laravel test email');

    });
    return "asd";
});



Route::get('/reset/password','clientController@reset_password_view');

Route::post('/password/reset','clientController@reset_password');

Route::get('/verify/{username}/{verfication_code}','clientController@verify_code');
Route::post('/password/change/{username}','clientController@password_change');