<?php

namespace Gregoriohc\StaticCache\Tests;

use Gregoriohc\StaticCache\Cache;

/**
 * @runTestsInSeparateProcesses
 */
class ExampleTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that cache can set value
     */
    public function testCanSetValue()
    {
        $return = Cache::set('key', 'value');

        $this->assertNull($return);
    }

    /**
     * Test that cache can has value
     */
    public function testCanHasValue()
    {
        Cache::set('key', 'value');
        $has = Cache::has('key');

        $this->assertTrue($has);
    }

    /**
     * Test that cache can get value
     */
    public function testCanGetValue()
    {
        Cache::set('key', 'value');
        $value = Cache::get('key');

        $this->assertEquals('value', $value);
    }

    /**
     * Test that cache can get value
     */
    public function testCanGetValueWithDefault()
    {
        $value = Cache::get('key', 'default');

        $this->assertEquals('default', $value);
    }

    /**
     * Test that cache can get value
     */
    public function testCanGetValueWithDefaultClosure()
    {
        $value = Cache::get('key', function() {
            return 'default';
        });

        $this->assertEquals('default', $value);
    }

    /**
     * Test that cache can get value
     */
    public function testCannotGetMissingValue()
    {
        $this->expectException(\OutOfBoundsException::class);

        Cache::get('key');
    }

    /**
     * Test that cache can remember value
     */
    public function testCanRememberValue()
    {
        $value = Cache::remember('key', function() {
            return 'default';
        });

        $this->assertEquals('default', $value);

        $value = Cache::get('key');

        $this->assertEquals('default', $value);
    }


    /**
     * Test that cache can get value
     */
    public function testCanForgetValue()
    {
        Cache::set('key', 'value');
        Cache::forget('key');
        $has = Cache::has('key');

        $this->assertFalse($has);
    }
}
