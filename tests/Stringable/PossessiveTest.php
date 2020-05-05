<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class PossessiveTest extends TestCase
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
        $this->assertEquals('', Str::of('')->possessive()->get());
        $this->assertEquals('Bob\'s', Str::of('Bob')->possessive()->get());
        $this->assertEquals('Charles\'', Str::of('Charles')->possessive()->get());
        $this->assertEquals('its', Str::of('it')->possessive()->get());
    }
}
