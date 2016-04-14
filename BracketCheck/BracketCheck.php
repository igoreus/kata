<?php

namespace Kata\BracketCheck;

/*
 * A new language consists of only a few brackets, you need to build a compiler for the new language and report whether the code compiles or not.
 * The brackets are of the following types
 *
 * '{', '}'
 * '(', ')'
 * '[', ']'
 * '<', '>'
 * For example the expression "((({<()>}[])))" should compile without errors, whereas "[<[>]])" this is incorrect.
 *
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
interface BracketCheck
{

    /**
     * @param string $str
     * @return boolean
     */
    public function check($str);
}




