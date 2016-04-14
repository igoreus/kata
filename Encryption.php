<?php

namespace Kata;

/*
 * An English text needs to be encrypted using the following encryption scheme.
 * First, the spaces are removed from the text. Let LL be the length of this text.
 * Then, characters are written into a grid, whose rows and columns have the following constraints:
 *
 *  For example, the sentence "if man was meant to stay on the ground god would have given us roots"
 *  after removing spaces is 54 characters long, so it is written in the form of a grid with 7 rows and 8 columns.
 *
 * ifmanwas
 * meanttos
 * tayonthe
 * groundgo
 * dwouldha
 * vegivenu
 * sroots
 *
 * The encoded message is obtained by displaying the characters in a column, inserting a space,
 * and then displaying the next column and inserting a space, and so on.
 *  For example, the encoded message for the above rectangle is:
 * "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn sseoau"
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class Encryption
{

    /**
     * @return int
     */
    public function encrypt($str)
    {


    }
}
