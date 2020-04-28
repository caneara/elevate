<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class ChunkBy
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('chunkBy', function ($callback, bool $preserveKeys = false) {
            return $this->sliceBefore(fn ($item, $prevItem) =>
                $callback($item) !== $callback($prevItem), $preserveKeys);
        });
    }
}
