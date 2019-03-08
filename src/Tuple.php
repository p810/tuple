<?php

namespace p810\Tuple;

use Countable;
use TypeError;
use ArrayAccess;
use SplFixedArray;
use OutOfBoundsException;

/**
 * Represents an immutable list of values.
 */
final class Tuple implements ArrayAccess, Countable
{
    /**
     * The number of items in the container.
     * @var int
     */
    protected $size;

    /**
     * A container for the tuple's elements.
     * @var \SplFixedArray
     */
    protected $container;

    /**
     * Creates an instance of SplFixedArray to hold what's packed into `$items`.
     *
     * @param mixed[] $items
     * @return void
     */
    function __construct(...$items) {
        $this->size      = count($items);
        $this->container = SplFixedArray::fromArray($items);
    }

    /**
     * Determines if the index belongs to `Tuple::$container`.
     *
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset): bool {
        return $this->container->offsetExists($offset);
    }

    /**
     * Returns the value at the index `$offset` in `Tuple::$container`.
     *
     * @param int $offset
     * @return mixed
     * @throws \OutOfBoundsException if the offset is invalid
     */
    public function offsetGet($offset) {
        if (! $this->offsetExists($offset)) {
            throw new OutOfBoundsException;
        }

        return $this->container->offsetGet($offset);
    }

    /**
     * @throws \TypeError since tuples are immutable
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value): void {
        throw new TypeError('Cannot update or add new items to a tuple');
    }

    /**
     * @throws \TypeError since tuples are immutable
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset): void {
        throw new TypeError('Cannot remove items from a tuple');
    }

    /**
     * @inheritdoc
     */
    public function count(): int {
        return $this->container->getSize();
    }
}
