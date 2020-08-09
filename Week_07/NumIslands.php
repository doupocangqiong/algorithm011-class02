<?php
class Solution
{

    private $parent = [];
    private $rank = [];
    private $count = 0;

    function unionFind($grid)
    {
        $m = count($grid);
        $n = count($grid[0]);
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($grid[$i][$j] == '1') {
                    $this->parent[$i * $n + $j] = $i * $n + $j;
                    ++$this->count;
                }

                $this->rank[$i * $n + $j] = 0;
            }
        }
    }

    function find($i)
    {
        if ($this->parent[$i] != $i) {
            $this->parent[$i] = $this->find($this->parent[$i]);
        }
        return $this->parent[$i];
    }

    function union($x, $y)
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);
        if ($rootX != $rootY) {
            if ($this->rank[$rootX] > $this->rank[$rootY]) {
                $this->parent[$rootY] = $rootX;
            } else if ($this->rank[$rootX] < $this->rank[$rootY]) {
                $this->parent[$rootX] = $rootY;
            } else {
                $this->parent[$rootY] = $rootX;
                $this->rank[$rootX] += 1;
            }
            --$this->count;
        }

    }

    function numIslands($grid)
    {
        if (empty($grid) || !$grid[0]) return 0;

        $this->unionFind($grid);

        $directions = [[0, 1], [1, 0]];

        $m = count($grid);
        $n = count($grid[0]);
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($grid[$i][$j] == '1') {
                    foreach ($directions as $d) {
                        $nr = $i + $d[0];
                        $nc = $j + $d[1];
                        if ($nr >= 0 && $nc >= 0 && $nr < $m && $nc < $n && $grid[$nr][$nc] == '1') {
                            $this->union($i * $n + $j, $nr * $n + $nc);
                        }
                    }
                }
            }
        }
        return $this->count;
    }
}
