<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;

class HeadTest extends TestCase
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
    public function it_provides_head_macro()
    {
        $this->assertTrue(Collection::hasMacro('head'));
    }

    /** @test */
    public function it_gets_the_first_item_of_the_collection()
    {
        $data = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $this->assertEquals(1, $data->head());
    }

    /** @test */
    public function it_returns_null_if_the_collection_is_empty()
    {
        $data = new Collection();

        $this->assertNull($data->head());
    }
}
