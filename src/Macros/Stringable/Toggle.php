<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Toggle
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('toggle', function($first, $second, $loose = false) {
            if (! $loose and ! in_array($this->__toString(), [$first, $second], true)) {
                return $this;
            }

            return $this->__toString() === $first ? new Stringable($second) : new Stringable($first);
        });
    }
}
