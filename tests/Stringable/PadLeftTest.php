<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class PadLeftTest extends TestCase
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
        $this->assertEquals('ŤOUŤOUŤŽLU', Str::of("\u{17D}LU")->padLeft(10, "\u{164}OU")->get());
        $this->assertEquals('ŤOUŤOUŽLU', Str::of("\u{17D}LU")->padLeft(9, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padLeft(3, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padLeft(0, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padLeft(-1, "\u{164}OU")->get());
        $this->assertEquals('ŤŤŤŤŤŤŤŽLU', Str::of("\u{17D}LU")->padLeft(10, "\u{164}")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padLeft(3, "\u{164}")->get());
        $this->assertEquals('       ŽLU', Str::of("\u{17D}LU")->padLeft(10)->get());
    }
}
