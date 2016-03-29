<?php

namespace Kata;

/*
 * A new language consists of only a few brackets, you need to build a compiler for the new language and report whether the code compiles or not.
 * The brackets are of the following types
 *
 * '{', '}'
 * '(', ')'
 * '[', ']'
 * '<', '>'
 * For example the expression "((({<()>}[])))" should compile without errors, whereas "(())[<[>]])" this is incorrect.
 *
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class BracketCheck
{
    /** @var array */
    private $list;
    /** @var array  */
    private $brackets = [
        '{' => '}',
        '(' => ')',
        '[' => ']',
        '<' => '>',
    ];

    /**
     * @param array $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return array
     */
    public function run()
    {
        $result = [];
        foreach ($this->list as  $str) {
            $result[$str] = $this->check($str);
        }

        return $result;
    }

    /**
     * @param $str
     * @return bool
     */
    private function check($str)
    {
        $arr = str_split($str);

        while(count($arr)) {
            $index = -1;
            for ($i = 0; $i < count($arr); $i++) {

                if (isset($this->brackets[$arr[$i]]) && $arr[$i+1] == $this->brackets[$arr[$i]]) {
                    $index = $i;
                    array_splice($arr, $i,  2);
                    break;
                }
            }
            if ($index == -1) {

                return false;
            }
        }

        return true;
    }
}




