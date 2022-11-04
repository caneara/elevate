<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Tenth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('tenth', fn () => $this->get(9));
    }
}
