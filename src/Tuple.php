<?php

namespace p810\Tuple;

use Countable;
use ArrayAccess;
use LogicException;
use SplFixedArray;
use OutOfBoundsException;

/**
 * Represents an immutable list of values
 */
final class Tuple implements ArrayAccess, Countable
{
    /**
     * The number of items in the container
     * 
     * @var int
     */
    protected $size;

    /**
     * A container for the tuple's elements
     * 
     * @var \SplFixedArray
     */
    protected $container;

    function __construct(...$items)
    {
        $this->size = count($items);
        $this->container = SplFixedArray::fromArray($items);
    }

    /**
     * Returns a boolean indicating whether the given offset is a valid index in the current instance
     *
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return $this->container->offsetExists($offset);
    }

    /**
     * Returns the value at the given offset if applicable
     *
     * @param int $offset
     * @return mixed
     * @throws \OutOfBoundsException if the offset is invalid
     */
    public function offsetGet($offset)
    {
        if (! $this->offsetExists($offset)) {
            throw new OutOfBoundsException();
        }

        return $this->container->offsetGet($offset);
    }

    /**
     * @throws \LogicException since tuples are immutable
     * @see http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value): void
    {
        throw new LogicException('Cannot update or add new items to a tuple');
    }

    /**
     * @throws \LogicException since tuples are immutable
     * @see http://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset): void
    {
        throw new LogicException('Cannot remove items from a tuple');
    }

    public function count(): int
    {
        return $this->container->getSize();
    }
}
