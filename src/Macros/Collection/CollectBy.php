<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class CollectBy
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('collectBy', fn ($key, $default = null) => new Collection($this->get($key, $default)));
    }
}
