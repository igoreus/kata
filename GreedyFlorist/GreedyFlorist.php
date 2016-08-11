<?php

namespace Kata\GreedyFlorist;

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
    /**
     * @param $people
     * @param array $costs
     * @return int
     */
    public function calculate($people, array $costs)
    {
        $flowers = count($costs);
        rsort($costs);
        $sum = 0;

        for ($i = 0; $i < $flowers; ++$i) {
            $sum += ((int)($i/$people) + 1) * $costs[$i];
        }

        return $sum;
    }
}
