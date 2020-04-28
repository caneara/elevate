<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class SimplePaginate
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('simplePaginate', function ($perPage = 15, $pageName = 'page', $page = null, $options = []) {
            $page = $page ?: Paginator::resolveCurrentPage($pageName);

            $results = $this->slice(($page - 1) * $perPage)->take($perPage + 1);

            $options += [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ];

            return new Paginator($results, $perPage, $page, $options);
        });
    }
}
