<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $romanMapping = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];

        $total = 0;
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $currentValue = $romanMapping[$s[$i]];

            $nextValue = ($i + 1 < $length) ? $romanMapping[$s[$i + 1]] : 0;

            if($currentValue < $nextValue) {
                $total -= $currentValue;
            } else {
                $total += $currentValue;
            }
        }
        return $total;
    }
}