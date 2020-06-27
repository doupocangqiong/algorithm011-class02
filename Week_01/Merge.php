<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $num = [];
        $i = 0;
        $j = 0;
        while($i < $m && $j < $n)
        {
            if( $nums1[$i] <= $nums2[$j] ) {
                array_push($num, $nums1[$i]);
                $i ++;
            } else {
                array_push($num, $nums2[$j]);
                $j ++;
            }
        }
        while($i < $m && $j >= $n)
        {
            array_push($num, $nums1[$i]);
            $i ++;
        }
        while($j < $n && $i >= $m) {
            array_push($num, $nums2[$j]);
            $j ++;
        }
        $count = count($nums1);
        if($n + $m < $count) {
            $length = $count -$m - $n;
            $num = array_merge($num, array_slice($nums1, $m+$n, $length));
        }
        $nums1 = $num;
    }
}