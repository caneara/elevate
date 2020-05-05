<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class FromPairs
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('fromPairs', function() {
            return $this->reduce(function($assoc, $keyValuePair) {
                [$key, $value] = $keyValuePair;
                $assoc[$key] = $value;

                return $assoc;
            }, new Collection);
        });
    }
}
