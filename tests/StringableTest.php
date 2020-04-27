<?php declare(strict_types = 1);

namespace Elevate\Tests;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class StringableTest extends TestCase
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
    public function it_verifies_the_get_macro()
    {
        $this->assertEquals('test', Str::of('test')->get());
    }
}
