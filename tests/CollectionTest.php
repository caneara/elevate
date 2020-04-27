<?php declare(strict_types = 1);

namespace Elevate\Tests;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class CollectionTest extends TestCase
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
    public function it_verifies_the_trim_macro()
    {
        $padded = [' one', 'two ', ' three '];
        $clean  = ['one', 'two', 'three'];

        $this->assertEquals($clean, collect($padded)->trim()->toArray());
    }
}
