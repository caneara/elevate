<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Amp\Parallel\Worker\Pool;
use function Amp\Promise\wait;
use Illuminate\Support\Collection;
use Amp\Parallel\Worker\DefaultPool;
use function Amp\ParallelFunctions\parallelMap;

class ParallelMap
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('parallelMap', function($callback, $workers = null) {
            $pool = null;

            if ($workers instanceof Pool) {
                $pool = $workers;
            }

            if (is_int($workers)) {
                $pool = new DefaultPool($workers);
            }

            $promises = parallelMap($this->items, $callback, $pool);

            return new Collection(wait($promises));
        });
    }
}
