<?php

function insertSort($arr)
{
    // 已经间接将数组分成了2部分，下标小于当前的（左边的）是排序好的序列
    for ($i = 1, $len = count($arr);$i < $len; $i ++)
    {
        // 获得当前需要比较的元素值。
        $tmp = $arr[$i];
        // 内层循环，控制比较并插入
        for($j = $i-1;$j >= 0;$j --)
        {
            if ($tmp < $arr[$j]) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                break;
            }
        }
    }
    return $arr;
}