<?php

/**
 * PHP Array Permutations Iterator.
 *
 * @since 1.0.0
 * @package Dw\Utils
 * @copyright 2021 Dom Webber <dom.webber@hotmail.com>
 * @link https://github.com/domwebber
 */

use Dw\Utils\ArrayTogglePermutations;

// The input array
$array = [0, 1, 2];

// Create the iterator instance
$iterator = new ArrayTogglePermutations($array);

// Loop through each permutation
foreach ($iterator as $permutation) {
    // Do something with the combination... For example:
    echo join(", ", $permutation);
}
