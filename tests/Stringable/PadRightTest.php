<?php declare(strict_types = 1);

namespace Elevate\Tests\Stringable;

use Illuminate\Support\Str;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class PadRightTest extends TestCase
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
        $this->assertEquals('ŽLUŤOUŤOUŤ', Str::of("\u{17D}LU")->padRight(10, "\u{164}OU")->get());
        $this->assertEquals('ŽLUŤOUŤOU', Str::of("\u{17D}LU")->padRight(9, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padRight(3, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padRight(0, "\u{164}OU")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padRight(-1, "\u{164}OU")->get());
        $this->assertEquals('ŽLUŤŤŤŤŤŤŤ', Str::of("\u{17D}LU")->padRight(10, "\u{164}")->get());
        $this->assertEquals('ŽLU', Str::of("\u{17D}LU")->padRight(3, "\u{164}")->get());
        $this->assertEquals('ŽLU       ', Str::of("\u{17D}LU")->padRight(10)->get());
    }
}
