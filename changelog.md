## 2.0.0
- Changes the exception thrown by `p810\Tuple::offsetGet()`, `p810\Tuple::offsetSet()`, and `p810\Tuple::offsetUnset()` from `TypeError` to `LogicException`
- Removes unnecessary docblocks/docblock annotations

I just wanted to change that `TypeError` to something more fitting. I think at the time I choose `TypeError` because this is a "faux data type," but I realize now that `LogicException` makes more sense because it should lead to a fix in the code if any of those errors are raised. That, and `TypeError` [has some explicit use cases](https://www.php.net/manual/en/class.typeerror.php) that I'd failed to notice before. Also, there are a few minor aesthetic/documentation changes to reflect my current coding style more.
