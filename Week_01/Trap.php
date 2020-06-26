<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $max_left = [];
        $max_right = [];
        $sum = 0;
        $lengh = count($height);
        $max_left[0] = $height[0];
        for($l = 1; $l < $lengh; $l++)
        {
            $max_left[$l] = max($height[$l], $max_left[$l-1]);
        }
        $max_right[$lengh-1] = $height[$lengh-1];
        for($r = $lengh - 2; $r >=0 ;$r--)
        {
            $max_right[$r] = max($height[$r], $max_right[$r + 1]);
        }

        for($i = 0; $i < $lengh-1; $i++)
        {
            $currentArea = min($max_left[$i], $max_right[$i]) - $height[$i];
            $sum = $sum + $currentArea;
        }
        return $sum;
    }
}