<?php
class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        sort($g);
        sort($s);
        $gLength = count($g);
        $sLength = count($s);
        $count = $i = $j = 0;
        while($i < $gLength && $j < $sLength) {
            if($g[$i] <= $s[$j]) {
                $count ++;
                $i ++;
                $j ++;
            } else {
                $j ++;
            }
        }
        return $count;
    }
}