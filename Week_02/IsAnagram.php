<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $sLength = strlen($s);
        $tLength = strlen($t);
        if($sLength == $tLength) {
            $map = [];
            for($i = 0; $i < $sLength; $i ++)
            {
                !isset($map[$s[$i]])? ($map[$s[$i]] = 1): $map[$s[$i]]++;
            }

            for($j = 0; $j < $tLength; $j++)
            {
                if(!isset($map[$t[$j]])) return false;
                $map[$t[$j]] --;
            }
            foreach($map as $value) {
                if($value != 0 ) return false;
            }
            return true;
        }
        return false;
    }
}