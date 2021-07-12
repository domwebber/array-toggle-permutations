<?php

/**
 * PHP Array Permutations Iterator.
 *
 * @since 1.0.0
 * @package Dw\Utils
 * @copyright 2021 Dom Webber <dom.webber@hotmail.com>
 * @link https://github.com/domwebber
 */

namespace Dw\Utils\Tests;

use Generator;
use PHPUnit\Framework\TestCase;
use Dw\Utils\ArrayTogglePermutations;

/**
 * PHP Array Permutations Iterator Tests.
 * This tests that the permutation logic executes correctly.
 *
 * @since 1.0.0
 * @author Dom Webber <dom.webber@hotmail.com>
 */
final class ArrayTogglePermutationsTest extends TestCase
{
    /**
     * Data provider for valid iteration tests.
     *
     * @since 1.0.0
     *
     * @return Generator<string, mixed[]>
     */
    public function validIterationProvider(): Generator
    {
        yield "Simple numerically-indexed array iterations" => [
            [0, 1, 2],
            [
                [],
                [2],
                [1],
                [1,2],
                [0],
                [0,2],
                [0,1],
                [0,1,2]
            ]
        ];

        yield "Simple associative-indexed array iterations" => [
            [
                "red" => "apple",
                "yellow" => "lemon",
                "green" => "lime"
            ],
            [
                [],
                [
                    "green" => "lime"
                ],
                [
                    "yellow" => "lemon"
                ],
                [
                    "yellow" => "lemon",
                    "green" => "lime"
                ],
                [
                    "red" => "apple"
                ],
                [
                    "red" => "apple",
                    "green" => "lime"
                ],
                [
                    "red" => "apple",
                    "yellow" => "lemon"
                ],
                [
                    "red" => "apple",
                    "yellow" => "lemon",
                    "green" => "lime"
                ]
            ]
        ];

        yield "Short array" => [
            [0],
            [
                [],
                [0]
            ]
        ];

        yield "Empty array" => [
            [],
            []
        ];
    }

    /**
     * Test the Array Permutations iterator with valid arrays.
     * Assumes that the outputs are going to be as expected.
     *
     * @since 1.0.0
     * @dataProvider validIterationProvider
     *
     * @param array<string|int,mixed> $array
     * @param array<string|int,mixed>[] $expectation
     * @return void
     */
    public function testValidIteration(
        array $array,
        array $expectation
    ): void {
        // Create the iterator
        $iterator = new ArrayTogglePermutations(
            $array
        );

        $output = iterator_to_array($iterator);

        $this->assertEquals($expectation, $output);
        $this->assertEquals(count($expectation), $iterator->getPermutations());

        $it = new ArrayTogglePermutations([
            0
        ]);

        foreach ($it as $perm) {
            if ($it->key() == 0) {
                continue;
            }

            if ($it->key() === ($it->getPermutations() - 1)) {
                continue;
            }

            var_dump($perm);
        }
    }
}
