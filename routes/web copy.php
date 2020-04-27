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
    return view('home');
});
Route::group(['middleware'=>'auth'],function(){
Route::get('/complain', function () { return view('complain');})->name('complain');
Route::post('/complain', ['uses' => 'ComplainController@store'])->name('complain');
Route::get('complain/thankyou', ['uses' => 'ThankyouController@index'])->name('complain/thankyou');


});
Route::get('/contactus', ['uses' => 'ContactusController@index'])->name('contact-us');
Route::post('/contactus', ['uses' => 'ContactusController@store'])->name('contact-us');
Route::get('contactus/thankyou', ['uses' => 'ThankyouController@index'])->name('contact-us/thankyou');
Route::get('/about-us', function () { return view('aboutus');})->name('about-us');



Route::group(['namespace' => 'powerpanel'], function () {
    Route::get('/powerpanel/dashboard', ['uses' => 'DashboardController@index'])->name('dashboard.index');
    Route::post('powerpanel/contactus', ['uses' => 'ContactUsLeadController@store'])->name('contact.store');

    Route::resource('powerpanel/users','UserController',['names'=>[


        'index'=>'powerpanel.users.index',
        'create'=>'powerpanel.users.create',
        'store'=>'powerpanel.users.store',
        'edit'=>'powerpanel.users.edit',
        'profile'=>'powerpanel.users.edit',
        
    ]]);
    
    // Route::resource('admin/posts','AdminPostsController',['names'=>[
    //     'index'=>'admin.posts.index',
    //     'create'=>'admin.posts.create',
    //     'store'=>'admin.posts.store',
    //     'edit'=>'admin.posts.edit',
    
    
    // ]]);
    Route::resource('powerpanel/complains','ComplainController',['names'=>[
    
        'index'=>'powerpanel.complains.index',
        'create'=>'powerpanel.complains.create',
        'store'=>'powerpanel.complains.store',
        'edit'=>'powerpanel.complains.edit',
        // 'deleteMedia'=>'admin.complains.deleteMedia',
    ]]);
    Route::resource('powerpanel/contactus','ContactUsLeadController',['names'=>[
    
        'index'=>'powerpanel.contactus.index',
        'create'=>'powerpanel.contactus.create',
        'store'=>'powerpanel.contactus.store',
        'edit'=>'powerpanel.contactus.edit',
        // 'deleteMedia'=>'admin.complains.deleteMedia',
    ]]);
    Route::resource('powerpanel/role','RoleController',['names'=>[
    
        'index'=>'powerpanel.roles.index',
        'create'=>'powerpanel.roles.create',
        'store'=>'powerpanel.roles.store',
        'edit'=>'powerpanel.roles.edit',
        // 'deleteRecord'=>'powerpanel.roles.deleteRecord',
        
    
        // 'deleteMedia'=>'admin.complains.deleteMedia',
    ]]);
    
    Route::resource('powerpanel/complain-category','ComplainCategoryController',['names'=>[
    
        'index'=>'powerpanel.complaincategory.index',
        'create'=>'powerpanel.complaincategory.create',
        'store'=>'powerpanel.complaincategory.store',
        'edit'=>'powerpanel.complaincategory.edit',
        'deleteRecord'=>'admin.complaincategory.deleteRecord',
        
    
        // 'deleteMedia'=>'admin.complains.deleteMedia',
    ]]);
    
});

Route::get('powerpanel/', 'Auth\LoginController@showLoginForm');
Route::get('powerpanel/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('powerpanel/login', 'Auth\LoginController@login');
Route::post('powerpanel/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');