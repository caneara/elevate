<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Before
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro(
            'before',
            fn($currentItem, $fallback = null) =>
            $this->reverse()->after($currentItem, $fallback)
        );
    }
}
