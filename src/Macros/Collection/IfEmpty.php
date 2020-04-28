<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class IfEmpty
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('ifEmpty', function ($callback) {
            if ($this->isEmpty()) {
                $callback($this);
            }

            return $this;
        });
    }
}
