<?php declare(strict_types = 1);

namespace Elevate\Tests\Blade;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Blade;

class FilledTest extends TestCase
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
        $blade = '@filled($test) 1 @else 2 @endfilled';
        $php   = '<?php if (\Illuminate\Support\Facades\Blade::check(\'filled\', $test)): ?> 1 <?php else: ?> 2 <?php endif; ?>';

        $this->assertEquals($php, Blade::compileString($blade));
    }
}
