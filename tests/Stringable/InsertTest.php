<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class InsertTest extends TestCase
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
        $this->assertEquals('foobar', Str::of('foo')->insert('bar', 3)->get());
        $this->assertEquals('foobar', Str::of('foo')->insert('bar', 30)->get());
        $this->assertEquals('barfoo', Str::of('foo')->insert('bar', 0)->get());
        $this->assertEquals('fbaroo', Str::of('foo')->insert('bar', 1)->get());
    }
}
