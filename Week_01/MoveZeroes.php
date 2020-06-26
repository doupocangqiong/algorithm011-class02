<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {

        $nonZeroCount = 0;
        foreach($nums as $key => $value) {
            if ( $value != 0 ) {

                if($nonZeroCount != $key) {
                    list($nums[$nonZeroCount], $nums[$key]) = [$nums[$key], $nums[$nonZeroCount]];
                }
                $nonZeroCount ++;
            }
        }
    }
}