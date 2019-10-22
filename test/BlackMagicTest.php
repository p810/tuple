<?php

use p810\Tuple\Tuple;
use PHPUnit\Framework\TestCase;

class BlackMagicTest extends TestCase
{
    public function test_black_magic_function_returns_tuple_instance()
    {
        $tuple = 󠀠('hello world', true, 0, null);

        $this->assertInstanceOf(Tuple::class, $tuple);
        $this->assertTrue($tuple[1]);
        $this->assertEquals('hello world', $tuple[0]);
    }
}
