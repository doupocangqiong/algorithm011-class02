<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $length = strlen($s);
        $max = 0;
        $dp[0] = 0;
        for($i = 1; $i < $length; $i ++)
        {
            if($s[$i] == ')') {
                if($s[$i-1] == '(') {
                    $dp[$i] = 2;
                    if($i - 2 >= 0)
                        $dp[$i] = $dp[$i-2] + 2;
                } elseif($dp[$i-1] > 0) {
                    if( ($i - $dp[$i-1] - 1) >= 0 && $s[$i-$dp[$i-1] - 1] == '(') {
                        $dp[$i] = $dp[$i - 1] + 2;
                        if( ($i - $dp[$i-1] -2) > 0) {
                            $dp[$i] = $dp[$i] + $dp[$i - $dp[$i-1] - 2];
                        }
                    }
                }
            }
            $max = max($max, $dp[$i]);
        }
        return $max;
    }
}