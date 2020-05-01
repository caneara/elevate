<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Carbon\CarbonImmutable;
use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class CarbonizeTest extends TestCase
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
        $this->assertEquals(
            collect([
                new CarbonImmutable('yesterday'),
                new CarbonImmutable('tomorrow'),
                new CarbonImmutable('2017-07-01'),
            ]),
            collect([
                'yesterday',
                'tomorrow',
                '2017-07-01',
            ])->carbonize()
        );
    }
}
