<?php

namespace Stephenjude\ExtendedArtisanCommands;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\ExtendedArtisanCommands\Skeleton\SkeletonClass
 */
class ExtendedArtisanCommandsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'extended-artisan-commands';
    }
}
