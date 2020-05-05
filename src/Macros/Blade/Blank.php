<?php declare(strict_types = 1);

namespace Elevate\Macros\Blade;

use Illuminate\Support\Facades\Blade;

class Blank
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Blade::if('blank', fn($expression) => blank($expression));
    }
}
