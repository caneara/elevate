<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class PrependIf
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('prependIf', function($text) {
            return new Stringable(
                Str::startsWith($this->__toString(), $text) ? $this->__toString() : $text . $this->__toString()
            );
        });
    }
}
