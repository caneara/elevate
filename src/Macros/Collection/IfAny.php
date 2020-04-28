<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class IfAny
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('ifAny', function ($callback) {
            if (! $this->isEmpty()) {
                $callback($this);
            }

            return $this;
        });
    }
}
