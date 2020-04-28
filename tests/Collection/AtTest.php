<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;

class AtTest extends TestCase
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
    public function it_retrieves_an_item_by_positive_index()
    {
        $data = new Collection([1, 2, 3]);

        $this->assertEquals(2, $data->at(1));
    }

    /** @test */
    public function it_retrieves_an_item_by_negative_index()
    {
        $data = new Collection([1, 2, 3]);

        $this->assertEquals(3, $data->at(-1));
    }

    /** @test */
    public function it_retrieves_an_item_by_zero_index()
    {
        $data = new Collection([1, 2, 3]);

        $this->assertEquals(1, $data->at(0));
    }
}
