<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $s_length = strlen($s);
        if ($s_length < 1) {
            return '';
        } elseif ($s_length <= 2) {
            return $s{0} == $s{1} ? $s : $s{0};
        }

        $start = 0;
        $offset = 0;

        for ($i = 0; $i < $s_length; $i ++) {

            if ($offset/2 > $s_length - $i) {
                break;
            }

            $len1 = $this->around($s, $s_length, $i, $i);
            $len2 = $this->around($s, $s_length, $i, $i + 1);

            if ($len1 > $len2) {
                if ($len1 > $offset) {
                    $start = $i - ($len1 - 1)/2;
                    $offset = $len1;
                }
            } else {
                if ($len2 > $offset) {
                    $start = $i - $len2/2 + 1;
                    $offset = $len2;
                }
            }
        }

        return substr($s, $start, $offset);
    }

    function around($s, $s_length, $left, $right)
    {
        while ($left >= 0 && $right < $s_length && $s{$left} == $s{$right}) {
            $left --;
            $right ++;
        }

        return $right - $left - 1;
    }

}