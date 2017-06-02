<?php

namespace p810\Tuple;

/**
 * Acts as a factory function for instances of `p810\Tuple\Tuple`.
 *
 * This is my preferred way of creating tuples, since it resembles the `array()`
 * language construct.
 *
 * @todo Look into writing a C extension to give tuples some syntax sugar...
 *
 * @param mixed[] $items
 * @return p810\Tuple\Tuple
 */
function tuple(...$items): Tuple {
    return new Tuple(...$items);
}
