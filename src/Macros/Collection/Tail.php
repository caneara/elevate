<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Tail
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('tail', fn($preserveKeys = false) =>
            ! $preserveKeys ? $this->slice(1)->values() : $this->slice(1)
        );
    }
}
