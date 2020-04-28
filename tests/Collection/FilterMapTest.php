<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;

class FilterMapTest extends TestCase
{
    /**
     * Register the service providers.
     *
     **/
    protected function getPackageProviders($app) : array
    {
        return [ServiceProvider::class];
    }

    /** @test */
    public function it_returns_a_mapped_collection_without_empty_values()
    {
        $result = Collection::make([1, 2, 3, 4, 5, 6])->filterMap(function ($number) {
            $quotient = $number / 3;

            return is_int($quotient) ? $quotient : null;
        });

        $this->assertEquals([1, 2], $result->values()->toArray());
    }
}
