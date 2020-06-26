<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $count = count($digits);

        if($digits[$count-1] == 9) {
            $current = $count-1;
            $digits[$current] ++;
            while($digits[$current] > 9 )
            {
                if($current - 1 < 0) {
                    array_unshift($digits, 1);
                    $digits[$current+1] = 0;
                } else {
                    $digits[$current] = 0;
                    $digits[$current - 1] ++;
                }
                $current --;
            }

        } else {
            $digits[$count-1] ++;
        }
        return $digits;
    }
}