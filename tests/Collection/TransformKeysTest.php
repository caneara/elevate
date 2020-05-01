<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Elevate\ServiceProvider;
use Orchestra\Testbench\TestCase;

class TransformKeysTest extends TestCase
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
                'A' => 'value',
                'B' => 'value',
                'C' => 'value',
            ]),
            collect([
                'a' => 'value',
                'b' => 'value',
                'c' => 'value',
            ])->transformKeys('strtoupper')
        );
    }
}
