<?php

use p810\Tuple\Tuple;
use function p810\Tuple\tuple;
use PHPUnit\Framework\TestCase;

class TupleTest extends TestCase
{
    public function testOffsetGet(): Tuple {
        $tuple = tuple('foo', 'bar');

        $this->assertEquals('foo', $tuple[0]);

        return $tuple;
    }

    /**
     * @depends testOffsetGet
     */
    public function testOffsetCannotBeUpdated(Tuple $tuple): Tuple {
        try {
            $tuple[0] = 'baz';
        } catch (TypeError $e) {
            $this->assertInstanceOf(TypeError::class, $e);
        }

        return $tuple;
    }

    /**
     * @depends testOffsetCannotBeUpdated
     */
    public function testOffsetCannotBeRemoved(Tuple $tuple): Tuple {
        try {
            unset($tuple[0]);
        } catch (TypeError $e) {
            $this->assertInstanceOf(TypeError::class, $e);
        }

        return $tuple;
    }

    /**
     * @depends testOffsetCannotBeRemoved
     */
    public function testTupleSizeIsTwo(Tuple $tuple) {
        $this->assertEquals(2, $tuple->size());
    }
}
