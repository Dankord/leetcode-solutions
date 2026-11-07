<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $first = count($nums1);
        $second = count($nums2);

        if ($first > $second) {
            return $this->findMedianSortedArrays($nums2, $nums1);
        }

        $low = 0;
        $high = $first;

        while ($low <= $high) {
            $partitionX = intval(($low + $high) / 2);
            $partitionY = intval(($first + $second + 1) / 2) - $partitionX;

            $maxLeftX = ($partitionX == 0) ? PHP_INT_MIN : $nums1[$partitionX - 1];
            $minRightX = ($partitionX == $first) ? PHP_INT_MAX : $nums1[$partitionX];

            $maxLeftY = ($partitionY == 0) ? PHP_INT_MIN : $nums2[$partitionY - 1];
            $minRightY = ($partitionY == $second) ? PHP_INT_MAX : $nums2[$partitionY];

            if($maxLeftX <= $minRightY && $maxLeftY <= $minRightX) {
                if(($first + $second) % 2 != 0) {
                    return max($maxLeftX, $maxLeftY);
                }
                return (max($maxLeftX, $maxLeftY) + min($minRightX, $minRightY)) / 2.0;
            }
            elseif ($maxLeftX > $minRightY) {
                $high = $partitionX - 1;
            } else {
                $low = $partitionX + 1;
            }
        }
    }
}