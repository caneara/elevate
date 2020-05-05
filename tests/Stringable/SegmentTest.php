<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class SegmentTest extends TestCase
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
        $this->assertEquals('', Str::of('')->segment('/', 0)->get());

        $this->assertEquals('foo', Str::of('foo/bar/baz')->segment('/', 0)->get());
        $this->assertEquals('bar', Str::of('foo/bar/baz')->segment('/', 1)->get());
        $this->assertEquals('baz', Str::of('foo/bar/baz')->segment('/', 2)->get());

        $this->assertEquals('', Str::of('foo/bar/baz')->segment('/', 3)->get());

        $this->assertEquals('baz', Str::of('foo/bar/baz')->segment('/', -1)->get());
        $this->assertEquals('bar', Str::of('foo/bar/baz')->segment('/', -2)->get());
        $this->assertEquals('foo', Str::of('foo/bar/baz')->segment('/', -3)->get());

        $this->assertEquals('', Str::of('foo/bar/baz')->segment('/', -4)->get());
    }
}
