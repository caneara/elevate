<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Extract
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('extract', function($keys) {
            $keys = is_array($keys) ? $keys : func_get_args();

            return array_reduce(
                $keys,
                fn ($extracted, $key) =>
                $extracted->push(data_get($this->items, $key)),
                new Collection()
            );
        });
    }
}
