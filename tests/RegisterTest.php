<?php declare(strict_types = 1);

namespace Elevate\Tests;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Blade;

class RegisterTest extends TestCase
{

    /** @test */
    public function it_registers_the_macros()
    {
        (new ServiceProvider(app()))->boot();

        $blade = '@filled($test) 1 @else 2 @endfilled';

        $this->assertNotEquals($blade, Blade::compileString($blade));
    }



    /** @test */
    public function it_only_registers_the_requested_macros()
    {
        config(['elevate' => [
            'Blade' => [
                'Blank'  => true,
                'Filled' => false,
            ],
        ]]);

        (new ServiceProvider(app()))->boot();

        $blank  = '@blank($test) 1 @else 2 @endblank';
        $filled = '@filled($test) 1 @else 2 @endfilled';

        $this->assertNotEquals($blank, Blade::compileString($blank));
        $this->assertEquals('@filled($test) 1 <?php else: ?> 2 @endfilled', Blade::compileString($filled));
    }
}
