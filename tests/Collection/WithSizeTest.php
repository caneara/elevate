<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Illuminate\Support\Collection;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class WithSizeTest extends TestCase
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
    public function it_can_create_a_collection_with_the_specified_size()
    {
        $this->assertEquals([1], Collection::withSize(1)->toArray());
        $this->assertEquals([1, 2, 3], Collection::withSize(3)->toArray());
    }

    /** @test */
    public function it_can_creates_an_empty_collection_if_the_given_size_is_lower_than_one()
    {
        $this->assertCount(0, Collection::withSize(0));
        $this->assertCount(0, Collection::withSize(-1));
    }
}
