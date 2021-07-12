<?php

/**
 * PHP Array Permutations Iterator.
 *
 * @since 1.0.0
 * @package Dw\Utils
 * @copyright 2021 Dom Webber <dom.webber@hotmail.com>
 * @link https://github.com/domwebber
 */

namespace Dw\Utils;

use Iterator;
use MathPHP\Probability\Combinatorics;

/**
 * PHP Array Permutations Iterator.
 * Toggles the values in an array and iterates through every
 * possibile combination of array items.
 * Each permutation: O(n)
 * All permutations: O(n^2)
 *
 * @since 1.0.0
 * @author Dom Webber <dom.webber@hotmail.com>
 *
 * @implements Iterator<string|int,mixed>
 */
class ArrayTogglePermutations implements Iterator
{
    /**
     * The current pointer position.
     *
     * @since 1.0.0
     *
     * @var int
     */
    private $position;

    /**
     * The permuting array.
     *
     * @since 1.0.0
     *
     * @var array<string|int,mixed>
     */
    private $array;

    /**
     * Constructor.
     *
     * @since 1.0.0
     *
     * @param array<string|int,mixed> $array
     */
    public function __construct(
        array $array
    ) {
        $this->array = $array;
        $this->position = 0;
    }

    /**
     * Rewind the iterator to the start.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * Calculate the number of possible permutations.
     * The number returned takes the additional options into account.
     *
     * @since 1.0.0
     *
     * @return int
     */
    public function getPermutations(): int
    {
        // n = array length
        $n = count($this->array);

        if ($n === 0) {
            return 0;
        }

        if ($n === 1) {
            return 2;
        }

        return (int) Combinatorics::permutations($n) + 2;
    }

    /**
     * Calculate the current permutation.
     * Array keys are not maintained if the input array keys are numeric,
     * however, the output array will maintain the same order as was input.
     *
     * @since 1.0.0
     *
     * @return array<string|int,mixed>
     */
    public function current()
    {
        // Calculate the binary toggle for indexes
        $toggle = str_pad(
            decbin($this->position),
            count($this->array),
            "0",
            \STR_PAD_LEFT
        );

        $output = [];
        $array_index = 0;
        foreach ($this->array as $key => $value) {
            // Conditionally append the key-value pair to the output array
            if ($toggle[$array_index]) {
                $output = array_merge(
                    $output,
                    [
                        $key => $value
                    ]
                );
            }

            // Increment the array index;
            $array_index++;
        }

        return $output;
    }

    /**
     * Retrieve the current pointer for the iteration.
     *
     * @since 1.0.0
     *
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Increment to the next iteration.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * Check whether the current iteration is allowed and exists.
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function valid(): bool
    {
        return $this->position < $this->getPermutations();
    }
}
