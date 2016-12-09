<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function (){
     
	
    // Dashboard
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

    // User Logout
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    /**
     * Users routes
     */
    Route::get('/user', [
        'as'    => 'admin.user.list',
        'uses'  => 'UserController@index'
    ]);
    Route::get('/user/create', [
        'as'    => 'admin.user.create',
        'uses'  => 'UserController@create'
    ]);
    Route::post('/user/create', [
        'as'    => 'admin.user.create',
        'uses'  => 'UserController@store'
    ]);
    Route::get('/user/{id}/edit', [
        'as'    => 'admin.user.edit',
        'uses'  => 'UserController@edit'
    ]);
    Route::post('/user/{id}/edit', [
        'as'    => 'admin.user.edit',
        'uses'  => 'UserController@update'
    ]);

    /**
     * Roles routes
     */
    Route::get('/role', [
        'as'    => 'admin.role.list',
        'uses'  => 'RoleController@index'
    ]);
    Route::get('/role/create', [
        'as'    => 'admin.role.create',
        'uses'  => 'RoleController@create'
    ]);
    Route::post('/role/create', [
        'as'    => 'admin.role.create',
        'uses'  => 'RoleController@store'
    ]);
    Route::get('/role/{id}/edit', [
        'as'    => 'admin.role.edit',
        'uses'  => 'RoleController@edit'
    ]);
    Route::post('/role/{id}/edit', [
        'as'    => 'admin.role.edit',
        'uses'  => 'RoleController@update'
    ]);

    /**
     * Email routes
     */
    Route::get('/emailtpls', 'EmailTemplateController@index');
	
    Route::get('/emailtpls/create', 'EmailTemplateController@create');
	
    Route::post('/emailtpls/store', 'EmailTemplateController@store');
	
    Route::get('/emailtpls/edit/{id}','EmailTemplateController@edit' );
	
    Route::post('/emailtpls/update','EmailTemplateController@update');

    Route::get('/clients/data','ClientController@data');
    Route::resource('/clients','ClientController');

    Route::get('/ls/data','LeadsourceController@data');
    Route::resource('/ls','LeadsourceController');

    Route::get('/pe/data','ProductionemailController@data');
    Route::resource('/pe','ProductionemailController');

    Route::get('/audit','AuditController@index');

    Route::resource('/qb','QuickBooksController');

    Route::get('/estimators_dashboard','ReportsController@estdash');
    Route::get('/leads_dashboard','ReportsController@leaddash');
    Route::get('/follow_up_dashboard','ReportsController@fudash');
    Route::get('/production_dashboard','ReportsController@prddash');
    Route::get('/completed_jobs_dashboard','ReportsController@cpjdash');
    Route::get('/days_to_meet_with_client','ReportsController@dmeetclient');
    Route::get('/days_to_submit_an_estimate','ReportsController@dsubestimate');
    Route::get('/days_to_sign_contract','ReportsController@dsigncont');


});

// User Login
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);

Route::get('forgot','Auth\AuthController@forgot');
Route::post('sendmail','Auth\AuthController@sendmail');

Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);


// Auth::routes();
/*
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
*/

// Route::get('/home', 'HomeController@index');
