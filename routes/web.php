<?php
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();
/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
], function()
{
    Route::get('/', 'PagesController@home');

    Route::get(LaravelLocalization::transRoute('routes.teKoop'), 'PagesController@forSale');

    Route::get(LaravelLocalization::transRoute('routes.teKoop.listing'), 'ListingsController@show');

    Route::get('/faq', 'PagesController@faq');

    Route::get('/contact', 'PagesController@contact');

    Route::get('images/{image}', function($image = null)
    {
        $path = storage_path() . $image;
        if (file_exists($path)) {
            return Response::download($path);
        }
    });
});

Route::post('contact/request', 'ContactController@contactRequest');

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
