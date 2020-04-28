<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;
use Elevate\Exceptions\CollectionItemNotFound;

class FirstOrFail
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('firstOrFail', function () {
            if (! is_null($item = $this->first())) {
                return $item;
            }

            throw new CollectionItemNotFound('No items found in collection.');
        });
    }
}
