# PHP Array Permutations Iterator

[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](http://makeapullrequest.com)
[![Latest Stable Version](http://poser.pugx.org/domwebber/array-toggle-permutations/v)](https://packagist.org/packages/domwebber/array-toggle-permutations)
[![Total Downloads](http://poser.pugx.org/domwebber/array-toggle-permutations/downloads)](https://packagist.org/packages/domwebber/array-toggle-permutations)
[![License](http://poser.pugx.org/domwebber/array-toggle-permutations/license)](https://packagist.org/packages/domwebber/array-toggle-permutations)

A helpful PHP utility that easily loops through every possible combination of array items. This package is intended for use in testing environments but is unit tested to the degree that it is also safe for use in a production environment too (within reason). This package can also handle associative arrays.

## Installation

Use the [composer](https://getcomposer.org) package manager to install the Array Permutations Iterator.

```bash
composer require domwebber/array-toggle-permutations
```

## Usage

This library can be used to toggle the options of a numerically-indexed array or an associative array. In the case where an associative array is used, the array keys will be maintained. In either case, the array items will stay in the original order.

```php
use Dw\Utils\ArrayTogglePermutations;

$iterator = new ArrayTogglePermutations(
    [0,1,2]
);
```

**Basic usage:**

```php
// $iterator = new ArrayTogglePermutations(...);
foreach ($iterator as $permutation) {
    // Do something with the combination...
    var_dump($permutation);
}
```

**Skip first/last:**

```php
// $iterator = new ArrayTogglePermutations(...);
foreach ($iterator as $permutation) {
    // Skip first (empty)
    if ($it->key() == 0) {
        continue;
    }

    // Skip last (full)
    if ($it->key() === ($it->getPermutations() - 1)) {
        continue;
    }

    // Do something with the combination...
    var_dump($permutation);
}
```

## Contributing

See the [changelog](./CHANGELOG.md).

### File Signatures

Wherever possible, files should include a file signature comment.

```php
/**
 * PHP Array Permutations Iterator.
 *
 * @since 1.0.0
 * @package Dw\Utils
 * @copyright 2021 Dom Webber <dom.webber@hotmail.com>
 * @link https://github.com/domwebber
 */
```

## License

[GNU GPL v3.0](https://choosealicense.com/licenses/gpl-3.0)

&copy; 2021 Dom Webber
