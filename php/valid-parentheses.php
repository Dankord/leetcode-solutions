<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $stack = [];

        $parenthesis = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];

        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];

            if(array_key_exists($char, $parenthesis)) {
                $topElem = empty($stack) ? '#' : array_pop($stack);
                if($topElem !== $parenthesis[$char]) {
                    return false;
                }
            } else {
                $stack[] = $char;
            }
        }
        return empty($stack);
    }
}