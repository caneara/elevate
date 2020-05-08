<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Collapse
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('collapse', function() {
            return new Stringable(trim(mb_ereg_replace('[[:space:]]+', ' ', $this->__toString(), 'msr')));
        });
    }
}
