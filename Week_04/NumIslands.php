<?php
class Solution {
    private $rowLength;
    private $columnLength;

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        if(empty($grid)) return 0;
        $count = 0;
        $this->rowLength = count($grid);
        $this->columnLength = count($grid[0]);
        for($i = 0; $i < $this->rowLength; $i ++ ) {
            for($j = 0; $j < $this->columnLength; $j ++) {
                if($grid[$i][$j] == '1') {
                    $this->dfs($grid, $i, $j);
                    $count ++;
                }
            }
        }
        return $count;
    }

    function dfs(&$grid, $i, $j) {
        if($i <0 || $j < 0 || $i >=  $this->rowLength || $j >= $this->columnLength || $grid[$i][$j] == '0')
            return ;
        $grid[$i][$j] = 0;
        $this->dfs($grid, $i + 1, $j);
        $this->dfs($grid, $i - 1, $j);
        $this->dfs($grid, $i, $j - 1);
        $this->dfs($grid, $i, $j + 1);
    }
}