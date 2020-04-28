<?php declare(strict_types = 1);

namespace Elevate\Tests\Collection;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;

class ValidateTest extends TestCase
{
    /** @test */
    public function it_returns_true_if_a_collection_passes_validation_with_a_callback()
    {
        $this->assertTrue(Collection::make(['foo', 'foo'])->validate(function ($item) {
            return $item === 'foo';
        }));
    }

    /** @test */
    public function it_returns_false_if_a_collection_fails_validation_with_a_callback()
    {
        $this->assertFalse(Collection::make(['foo', 'bar'])->validate(function ($item) {
            return $item === 'foo';
        }));
    }

    /** @test */
    public function it_returns_true_if_a_collection_passes_validation_with_a_string()
    {
        $this->assertTrue(Collection::make(['foo', 'bar'])->validate('required'));
    }

    /** @test */
    public function it_returns_false_if_a_collection_fails_validation_with_a_string()
    {
        $this->assertFalse(Collection::make(['foo', ''])->validate('required'));
    }

    /** @test */
    public function it_returns_true_if_a_collection_passes_validation_with_an_array()
    {
        $this->assertTrue(Collection::make([['name' => 'foo'], ['name' => 'bar']])->validate(['name' => 'required']));
    }

    /** @test */
    public function it_returns_false_if_a_collection_fails_validation_with_an_array()
    {
        $this->assertFalse(Collection::make([['name' => 'foo'], ['name' => '']])->validate(['name' => 'required']));
    }
}
