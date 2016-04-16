<?php

namespace Kata;

/*
 * You and K−1 friends want to buy N flowers. Each flower fi has some cost ci.
 * The florist is greedy and wants to maximize his number of new customers, so he increases the sale price of flowers for repeat customers;
 * more precisely, if a customer has already purchased x flowers,
 * price P for fi is Pfi=(x+1)×ci.
 *  Find  the minimum cost for your group to purchase N flowers.
 *
 * @author Igor Veremchuk igor.veremchuk@gmail.com
 */
class GreedyFlorist
{
    /** @var  int */
    private $people;
    /** @var array  */
    private $costs = [];

    /**
     * @param int $people
     * @param array $costs
     */
    public function __construct($people, array $costs)
    {
        $this->flowers = count($costs);
        $this->costs = $costs;
        rsort($this->costs);
        $this->people = $people;
    }

    /**
     * @return int
     */
    public function calculate()
    {
        $sum = 0;

        for ($i = 0; $i < $this->flowers; ++$i) {
            $sum += ((int)($i/$this->people) + 1) * $this->costs[$i];
        }

        return $sum;
    }
}
