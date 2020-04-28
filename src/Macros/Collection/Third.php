<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Third
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('third', fn () => $this->get(2));
    }
}
