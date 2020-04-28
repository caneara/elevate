<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class TrimTest extends TestCase
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
    public function it_verifies_the_macro()
    {
        $padded = [' one', 'two ', ' three '];
        $clean  = ['one', 'two', 'three'];

        $this->assertEquals($clean, collect($padded)->trim()->toArray());
    }
}
