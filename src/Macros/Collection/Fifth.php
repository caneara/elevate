<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Fifth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('fifth', fn () => $this->get(4));
    }
}
