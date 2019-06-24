<?php

namespace acr\sitemaps\Facades;

use Illuminate\Support\Facades\Facade;

class sitemaps extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sitemaps';
    }

}
