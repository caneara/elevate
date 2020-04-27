<?php declare(strict_types = 1);

namespace Elevate\Tests;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Blade;

class BladeTest extends TestCase
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
    public function it_verifies_the_blank_macro()
    {
        $blade = '@blank($test) 1 @else 2 @endblank';
        $php   = '<?php if (\Illuminate\Support\Facades\Blade::check(\'blank\', $test)): ?> 1 <?php else: ?> 2 <?php endif; ?>';

        $this->assertEquals($php, Blade::compileString($blade));
    }



    /** @test */
    public function it_verifies_the_filled_macro()
    {
        $blade = '@filled($test) 1 @else 2 @endfilled';
        $php   = '<?php if (\Illuminate\Support\Facades\Blade::check(\'filled\', $test)): ?> 1 <?php else: ?> 2 <?php endif; ?>';

        $this->assertEquals($php, Blade::compileString($blade));
    }
}
