<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class AppendIf
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('appendIf', function($text) {
            return new Stringable(
                Str::endsWith($this->__toString(), $text) ? $this->__toString() : $this->__toString() . $text
            );
        });
    }
}
