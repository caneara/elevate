<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Insert
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('insert', function($text, $index) {
            $index = $this->length() < $index ? $this->length() : $index;

            $before = mb_substr($this->__toString(), 0, $index);

            $after = mb_substr($this->__toString(), $index);

            return new Stringable($before . $text . $after);
        });
    }
}
