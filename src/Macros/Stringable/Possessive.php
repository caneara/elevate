<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Possessive
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('possessive', function() {
            $edge_cases = ['it'];

            if (blank($this->__toString())) {
                return $this;
            }

            if (in_array($this->__toString(), $edge_cases)) {
                return new Stringable($this->__toString() . 's');
            }

            return new Stringable($this->__toString() . '\'' . (
                $this->__toString()[strlen($this->__toString()) - 1] !== 's' ? 's' : ''
            ));
        });
    }
}
