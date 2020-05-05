<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class PadRight
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('padRight', function($length, $character = ' ') {
            $length     = max(0, $length - $this->length());
            $pad_length = mb_strlen($character);

            return new Stringable(
                $this->__toString() .
                str_repeat($character, (int) ($length / $pad_length)) .
                mb_substr($character, 0, $length % $pad_length)
            );
        });
    }
}
