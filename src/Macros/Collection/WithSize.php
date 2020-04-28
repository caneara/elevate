<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class WithSize
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('withSize', function ($size) {
            if ($size < 1) {
                return new Collection();
            }

            return new Collection(range(1, $size));
        });
    }
}
