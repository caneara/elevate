<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Prioritize
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('prioritize', function($callable) {
            $nonPrioritized = $this->reject($callable);

            return $this
                ->filter($callable)
                ->union($nonPrioritized);
        });
    }
}
