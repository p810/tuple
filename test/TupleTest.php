<?php

use p810\Tuple\Tuple;
use function p810\Tuple\tuple;
use PHPUnit\Framework\TestCase;

class TupleTest extends TestCase
{
    public function test_tuple_instance_is_created(): Tuple
    {
        $tuple = tuple('foo', 'bar');

        $this->assertInstanceOf(Tuple::class, $tuple);

        return $tuple;
    }

    /**
     * @depends test_tuple_instance_is_created
     */
    public function test_tuple_count_is_two(Tuple $tuple)
    {
        $this->assertEquals(2, count($tuple));
    }

    public function test_tuple_is_immutable()
    {
        $tuple = tuple('hello');

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Cannot update or add new items to a tuple');

        $tuple[0] = 'baz';

        return $tuple;
    }

    public function test_item_cannot_be_removed_from_tuple()
    {
        $tuple = tuple('world');

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Cannot remove items from a tuple');

        unset($tuple[0]);
    }
}
