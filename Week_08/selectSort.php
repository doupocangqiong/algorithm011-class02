<?php

function selectSort($arr)
{
    // 内层控制比较次数，比较$i后边的元素
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i ++)
    {
        // 先假设最小的值的位置
        $p = $i;
        // 内层控制比较次数，比较$i后边的元素
        for ($j = $i + 1;$j < $len; $j ++)
        {
            // $arr[$p]是当前已知的最小值
            if ($arr[$p] > $arr[$j]) {
                // 比较发现最小值的位置与当前假设的位置$i不同，则位置互换
                $p = $j;
            }
        }
        if ($p != $i) {
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    return $arr;
}