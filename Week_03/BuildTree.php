<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        if(count($preorder) == 0) return null;
        $treeNode = new TreeNode($preorder[0]);
        $index = array_search($preorder[0], $inorder);
        $treeNode->left = $this->buildTree(array_slice($preorder, 1, $index), array_slice($inorder, 0, $index));
        $treeNode->right = $this->buildTree(array_slice($preorder, $index+1), array_slice($inorder,$index+1));
        return $treeNode;
    }
}