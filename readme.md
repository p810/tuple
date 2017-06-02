# tuple

> An implementation of tuples in PHP.

## Installation

```
composer require p810/tuple --no-dev
```

## Usage

```php
<?php

use function p810\Tuple\tuple;

$tuple = tuple('foo', 'bar');
```

## Why?

This is a project I wanted to take on just for fun. I borrowed the idea from Python, which was my first introduction to the concept.

All in all, this utility is just a wrapper around a PHP object that implements `ArrayAccess` and restricts the ability to update, set, or remove items, which makes it immutable.
