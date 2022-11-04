<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class TransformKeys
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro(
            'transformKeys',
            fn ($operation) =>
            collect($this->items)->mapWithKeys(fn ($item, $key) => [$operation($key) => $item])
        );
    }
}
