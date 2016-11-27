<?php
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Auth::routes();
/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@home');

Route::get('/te-koop', 'PagesController@forSale');

Route::get('/faq', 'PagesController@faq');

Route::get('/contact', 'PagesController@contact');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware', 'prefix' => 'admin'], function()
{
    Route::resource('vehicles', 'VehiclesController');
    Route::resource('vehicleProperties', 'VehiclePropertiesController');
});

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::post('contact/request', 'ContactController@contactRequest');
