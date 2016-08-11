<?php

namespace Kata\Matrix\Test;

use Kata\Matrix\CounterClockwiseRotation;

class CounterClockwiseRotationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * #@dataProvider rotateDataProvider
     * @param $matrix
     * @param $expectedMatrix
     */
    public function rotate($matrix, $expectedMatrix)
    {
        $matrixRotation = new CounterClockwiseRotation();

        $this->assertEquals($expectedMatrix, $matrixRotation->rotate($matrix));
    }

    /**
     * @test
     */
    public function rotate4Times()
    {
        $matrix = [
            [2,2,2,1,],
            [3,3,3,1,],
            [4,5,6,1,],
            [7,8,9,1,],
        ];
        $matrixRotation = new CounterClockwiseRotation();
        $rotatedMatrix = $matrixRotation->rotate($matrix);
        $rotatedMatrix = $matrixRotation->rotate($rotatedMatrix);
        $rotatedMatrix = $matrixRotation->rotate($rotatedMatrix);
        $rotatedMatrix = $matrixRotation->rotate($rotatedMatrix);
        $this->assertEquals($matrix, $rotatedMatrix);
    }

    /**
     * @return array
     */
    public function rotateDataProvider()
    {
        return [
            [
                '$matrix' => [
                    [2,2,2,1,],
                    [3,3,3,1,],
                    [4,5,6,1,],
                    [7,8,9,1,],
                ],
                '$expectedMatrix' => [
                    [1,1,1,1],
                    [2,3,6,9],
                    [2,3,5,8],
                    [2,3,4,7],
                ],
            ],
            [
                '$matrix' => [
                    [2,2,2,],
                    [3,3,3,],
                    [4,5,6,],
                    [7,8,9,],
                ],
                '$expectedMatrix' => [
                    [2,3,6,9,],
                    [2,3,5,8,],
                    [2,3,4,7,],
                ],
            ],
            [
                '$matrix' => [
                    [2,2,2,1,],
                    [3,3,3,1,],
                    [4,5,6,1,],
                ],
                '$expectedMatrix' => [
                    [1,1,1,],
                    [2,3,6,],
                    [2,3,5,],
                    [2,3,4,],
                ],
            ],
        ];
    }
}
