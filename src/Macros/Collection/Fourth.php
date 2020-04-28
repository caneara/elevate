<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Fourth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('fourth', fn () => $this->get(3));
    }
}
