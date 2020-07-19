# 学习总结

## 搜索 - 遍历
* 每个节点都要访问一次
* 每个节点仅仅要访问一次

### 1、深度优先搜索(Depth-First-Search)

深度有限搜索有两种方式：
1. 递归。
2. 非递归，使用循环遍历，需要栈后进先出的特性来辅助。

递归代码模板：

    function dfs($node) {
        if (in_array($node, $visited)) {
            //already visited
            return;
        }
        $visited[] = $node;
        //process current node
        // ... logic 
        dfs($node->left);
        dfs($node->right);
    }
 
非递归模板：

    function dfs($node):
    if ($node == null) {
        return;
    }
    $visited = [];
    $stack[] = $node;
    while(count($stack) > 0) {
        $tempNode = array_pop($stack);
        $visited[$node->val] = true;
        process ($tempNode);
        $tempNodes = generate_related_nodes(tempNode);
        array_push($tempNodes,$nodes);    
    }

    // other processing work
    // ...
    
### 2、广度优先搜索(Breadth-First-Search)
按顺序遍历当前层所有节点，再向下一层继续搜索遍历。

实现需要队列先进先出的特性来辅助。

    function bfs($graph, $start, $end) {
        $queue[] = [$start];
        $visited[] = $start;
        while($queue) {
            $node = array_shift($queue);
            $visited[] = $node;
            process($node);
            $nodes = generateRelatedNodes($node);
            foreach($nodes as $currentNode)
            array_push($queue, $currentNode);
            //other processing work
            ...
        }
    }
    
    
## 贪心算法(Greedy)

贪心算法是一种在每一步选择中都采取在当前状态下最好或最优（即最有
利）的选择，也就是只考虑眼前。从而希望导致结果是全局最好或最优的算法。
一旦一个问题可以通过贪心法来解决，那么贪心法一般是解决这个问题的最
好办法。由于贪心法的高效性以及其所求得的答案比较接近最优结果，贪心
法也可以用作辅助算法或者直接解决一些要求结果不特别精确的问题。

## 二分查找

前提：
1. 目标函数单调性（单调递增或者递减）
2. 存在上下界（bounded）
3. 能够通过索引访问（index accessible)

代码模板：

    $left = 0;
    $right = count($array) -1;

    while $left <= $right: 
          $mid = ($left + $right) / 2 
          if ($array[$mid] == $target) 
                // find the target!! 
                break; or return $result; 
          elseif ($array[$mid] < $target) 
                $left = $mid + 1; 
          else 
                $right = $mid - 1;