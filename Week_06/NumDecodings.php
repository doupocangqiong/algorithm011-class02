<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        if($s[0] == 0) return 0;
        $length = strlen($s);
        if($length < 2) return 1;

        if($s[1] == 0 && $s[0] != 1 && $s[0] != 2) return 0;
        $dp[0] = 1;
        $dp[1] = ($s[0] * 10 + $s[1] <= 26) && $s[1] != 0?2:1;

        for($i = 2; $i < $length; $i ++)
        {
            if($s[$i] == 0 && $s[$i-1] != 1 && $s[$i-1] != 2) return 0;
            if($s[$i] == 0) $dp[$i] = $dp[$i-2];
            elseif($s[$i-1] == 1 || $s[$i-1] == 2 && $s[$i] <= 6) $dp[$i] = $dp[$i-1] + $dp[$i-2];
            else $dp[$i] = $dp[$i-1];
        }
        return $dp[$length-1];
    }
}