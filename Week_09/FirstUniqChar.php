<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if ($s== null) {
            return -1;
        }
        $st = str_split($s);
        $arr = array_count_values($st);
        for ($i = 0; $i < count($st); $i++) {
            if ($arr[$st[$i]]==1) {
                return $i;
            }
        }
        return -1;
    }
}