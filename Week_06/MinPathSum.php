<?php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        if($grid == null || count($grid) == 0 || count($grid[0]) == 0) return 0;

        $rowLength = count($grid[0]);
        $columnLength = count($grid);

        $dp[0][0] = $grid[0][0];
        for($i = 1; $i < $columnLength; $i ++) {
            $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];
        }
        for($j = 1; $j < $rowLength; $j ++) {
            $dp[0][$j] = $dp[0][$j-1] + $grid[0][$j];
        }
        for($i = 1; $i < $columnLength; $i ++) {
            for($j = 1; $j < $rowLength; $j ++) {
                $dp[$i][$j] = min($dp[$i-1][$j], $dp[$i][$j-1]) + $grid[$i][$j];
            }
        }
        return $dp[$columnLength-1][$rowLength-1];
    }


}