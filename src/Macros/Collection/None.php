<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class None
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('none', function($key, $value = null) {
            if (func_num_args() === 2) {
                return ! $this->contains($key, $value);
            }

            return ! $this->contains($key);
        });
    }
}
