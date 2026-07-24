# php_delay
PHP delay execute closures.

# install
```
composer require sn01615/php_delay
```

# usage

```php
use Tools;

$cc = 'aaa';
PhpDelay::getInstance()->push(function () use ($cc) {
    echo $cc;
});
echo 'bbb';
# response: bbbaaa
```
