<?php

namespace App\Providers;

use FineUploader\PhpTraditionalServer\UploadHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FineUploaderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('fineuploader', function($app)
        {
            return new UploadHandler();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fineuploader'];
    }
}
