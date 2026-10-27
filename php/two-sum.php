<?php

class Solution {

    /**
    * @param int[] $nums
    * @param int $target
    * @return int[]
     */
    function twoSum($nums, $target) {
        $store = [];

        foreach($nums as $index => $num) {
            $complement = $target - $num;

            if(array_key_exists($complement, $store)) {
                return [$store[$complement], $index];
            }
            $store[$num] = $index;
        }
    }
}