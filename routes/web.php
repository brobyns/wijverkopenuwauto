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

Route::get('images/{image}', function($image = null)
{
    $path = storage_path() . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware', 'prefix' => 'admin'], function()
{
    Route::resource('listings', 'ListingsController');
    Route::resource('vehicleProperties', 'VehiclePropertiesController');
    Route::post('upload', ['as' => 'admin.upload', 'uses' =>'UploadsController@fineUploaderEndpoint']);
});

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::post('contact/request', 'ContactController@contactRequest');
