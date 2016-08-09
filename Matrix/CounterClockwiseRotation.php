<?php

namespace Kata\Matrix;

/*
 * @author Igor Veremchuk igor.veremchuk@gmail.com
 */
class CounterClockwiseRotation implements Rotatable
{

    /** @var  array */
    private $matrix;

    /**
     * @param array $matrix
     */
    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;
    }

    /**
     * @return array
     */
    public function rotate()
    {
        $height = count($this->matrix);
        $width = count($this->matrix[0]);
        $res = [];

        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $res[$height - $j - 1][$i] = $this->matrix[$i][$j];
            }
        }
        ksort($res);
        $this->matrix = array_values($res);
        return $this->matrix;
    }
}




