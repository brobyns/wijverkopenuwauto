<?php
/**
 * Created by PhpStorm.
 * User: bramr
 * Date: 30/09/2016
 * Time: 18:59
 */

namespace App\Providers;

use Illuminate\Support\Facades\Facade;

class FineUploaderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'fineuploader';
    }
}