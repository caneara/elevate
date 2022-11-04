<?php declare(strict_types = 1);

namespace Elevate\Macros\Blade;

use Illuminate\Support\Facades\Blade;

class Filled
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Blade::if('filled', fn ($expression) => blank($expression));
    }
}
