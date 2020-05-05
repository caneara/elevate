<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class PadLeft
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('padLeft', function($length, $character = ' ') {
            $length     = max(0, $length - $this->length());
            $pad_length = mb_strlen($character);

            return new Stringable(
                str_repeat($character, (int) ($length / $pad_length)) .
                mb_substr($character, 0, $length % $pad_length) .
                $this->__toString()
            );
        });
    }
}
