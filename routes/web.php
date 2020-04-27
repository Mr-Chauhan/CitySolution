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

Route::get('/', 'HomeController@index');
Route::get('/history_bvn', 'HomeController@history')->name('history.bvn');
Route::get('/Place-to-see', 'HomeController@Place_to_see')->name('PlaceToSee');
Route::resource('/contact','ContactusController');

Route::get('complain/thankyou', ['uses' => 'ThankyouController@index'])->name('complain.thankyou');

Route::get('/complain/{id}',['as'=>'home.post','uses'=>'HomeController@post']);

Route::group(['middleware'=>'auth'],function(){
    Route::resource('/complain','ComplainController');

});
Route::get('contactus/thankyou', ['uses' => 'ThankyouController@index'])->name('contactus.thankyou');
Route::get('/about-us', function () { return view('aboutus');})->name('about-us');

 
    /* login */
    Route::get('powerpanel-login/', 'HomeController@index');

    Route::get('powerpanel/login', 'Powerpanel\Auth\LoginController@showLoginForm')->name('powerpanel.login');
    Route::post('powerpanel/login', 'Powerpanel\Auth\LoginController@login');
    Route::get('powerpanel/logout', 'Powerpanel\Auth\LoginController@logout')->name('powerpanel.logout');

    /* login */

Route::group(['namespace' => 'powerpanel','middleware'=>['isAdmin', 'auth:admin']], function () {
    
   


    Route::get('/powerpanel/dashboard', ['uses' => 'DashboardController@index'])->name('dashboard.index');

    Route::resource('powerpanel/users','UserController');
    Route::resource('powerpanel/role','RoleController');
    Route::resource('powerpanel/complain-category','ComplainCategoryController');
    Route::resource('powerpanel/contactus','ContactUsLeadController');
    Route::resource('powerpanel/complains','ComplainsController');
    Route::resource('powerpanel/profile','ProfileController');
    Route::resource('powerpanel/photogallery','PhotoGalleryController');

    Route::post('/powerpanel/users/deleteRecord', ['uses' => 'UserController@deleteRecord'])->name('users.deleteRecord');
    Route::post('/powerpanel/role/deleteRecord', ['uses' => 'RoleController@deleteRecord'])->name('role.deleteRecord');
    Route::post('/powerpanel/complain-category/deleteRecord', ['uses' => 'ComplainCategoryController@deleteRecord'])->name('complain-category.deleteRecord');
    Route::post('/powerpanel/complains/deleteRecord', ['uses' => 'ComplainsController@deleteRecord'])->name('complains.deleteRecord');
    Route::post('/powerpanel/contactus/deleteRecord', ['uses' => 'ContactUsLeadController@deleteRecord'])->name('contactus.deleteRecord');
    Route::post('/powerpanel/photogallery/deleteRecord', ['uses' => 'PhotoGalleryController@deleteRecord'])->name('photogallery.deleteRecord');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');