<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;

class FirstOrFailTest extends TestCase
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
    public function it_returns_first_item_when_there_is_one()
    {
        $result = Collection::make([1, 2, 3, 4])->firstOrFail();

        $this->assertEquals(1, $result);
    }

    /** @test */
    public function it_throws_exception_when_there_are_no_items()
    {
        $this->expectException(ItemNotFoundException::class);

        Collection::make()->firstOrFail();
    }
}
