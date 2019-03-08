<?php

use p810\Tuple\Tuple;

/**
 * An evil alias for \p810\Tuple\tuple()
 * 
 * @param mixed[] $items
 * @return \p810\Tuple\Tuple
 */
function 󠀠(...$items): Tuple {
    return new Tuple(...$items);
}
