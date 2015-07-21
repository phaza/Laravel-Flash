<?php

namespace DraperStudio\Flash\Facades;

use Illuminate\Support\Facades\Facade;

class Flash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}

