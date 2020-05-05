<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class ToggleTest extends TestCase
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
        $this->assertEquals('baz', Str::of('baz')->toggle('foo', 'bar')->get());
        $this->assertEquals('bar', Str::of('foo')->toggle('foo', 'bar')->get());
        $this->assertEquals('foo', Str::of('bar')->toggle('foo', 'bar')->get());
    }
}
