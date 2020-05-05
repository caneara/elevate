<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Validate
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('validate', function($callback) {
            if (is_string($callback) || is_array($callback)) {
                $validationRule = $callback;

                $callback = function($item) use ($validationRule) {
                    if (! is_array($item)) {
                        $item = ['default' => $item];
                    }

                    if (! is_array($validationRule)) {
                        $validationRule = ['default' => $validationRule];
                    }

                    return app('validator')->make($item, $validationRule)->passes();
                };
            }

            foreach ($this->items as $item) {
                if (! $callback($item)) {
                    return false;
                }
            }

            return true;
        });
    }
}
