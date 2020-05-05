<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Ninth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('ninth', fn() => $this->get(8));
    }
}
