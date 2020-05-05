<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Rotate
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('rotate', function($offset) {
            if ($this->isEmpty()) {
                return new Collection;
            }

            $count = $this->count();

            $offset %= $count;

            if ($offset < 0) {
                $offset += $count;
            }

            return new Collection($this->slice($offset)->merge($this->take($offset)));
        });
    }
}
