<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class EachCons
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('eachCons', function ($chunkSize, $preserveKeys = false) {
            $size = $this->count() - $chunkSize + 1;
            $result = collect(range(0, $size))->reduce(function ($result, $index) use ($chunkSize, $preserveKeys) {
                $next = $this->slice($index, $chunkSize);

                return $next->count() === $chunkSize ? $result->push($preserveKeys ? $next : $next->values()) : $result;
            }, new Collection([]));

            return $preserveKeys ? $result : $result->values();
        });
    }
}
