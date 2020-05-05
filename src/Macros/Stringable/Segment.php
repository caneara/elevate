<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Segment
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('segment', function($delimiter = ",", $index = 0) {
            $segments = explode($delimiter, $this->__toString());

            if ($index < 0) {
                $segments = array_reverse($segments);
                $index = abs($index) - 1;
            }

            $segment = isset($segments[$index]) ? $segments[$index] : '';

            return new Stringable($segment);
        });
    }
}
