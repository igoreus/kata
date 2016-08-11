<?php

namespace Kata\Matrix;

/*
 * @author Igor Veremchuk igor.veremchuk@gmail.com
 */
class CounterClockwiseRotation implements Rotatable
{

    /**
     * @inheritdoc
     */
    public function rotate(array $matrix)
    {
        $height = count($matrix);
        $width = count($matrix[0]);
        $res = [];

        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $res[$height - $j - 1][$i] = $matrix[$i][$j];
            }
        }
        ksort($res);
        return array_values($res);
    }
}




