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

You can also use the [Tag Space Unicode character](https://emojipedia.org/tag-space/) (U+E0020) as a function to make it look like tuples do in Python. This is a proof of concept that I thought would be fun to add. Your coworkers probably won't think it's very fun though so please, weigh your options before using this.

```php
$tuple = 󠀠('hello', 'world');
var_dump($tuple); // => p810\Tuple\Tuple#3 (2) {...}
```

## Why?
This is a project I wanted to take on just because. I borrowed the idea from Python, which was my first introduction to the concept.

All in all, this utility is just a wrapper around a PHP object that implements `ArrayAccess` and restricts the ability to update, set, or remove items, which makes it immutable.
