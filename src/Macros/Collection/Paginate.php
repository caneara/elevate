<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('paginate', function($perPage = 15, $pageName = 'page', $page = null, $total = null, $options = []) {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            $results = $this->forPage($page, $perPage)->values();

            $total = $total ?: $this->count();

            $options += [
                'path'     => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ];

            return new LengthAwarePaginator($results, $total, $perPage, $page, $options);
        });
    }
}
