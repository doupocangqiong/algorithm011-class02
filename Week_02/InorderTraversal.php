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

    private $orders = [];

    private $stack = [];
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if($root->left != null) {
            array_push($this->stack, $root->left);
            $this->subOrder();
        }
        array_push($this->orders, $root->val);

        if($root->right != null) {
            array_push($this->stack, $root->right);
            $this->subOrder();
        }
        return $this->orders;
    }

    public function subOrder()
    {
        while(count($this->stack) > 0)
        {
            $tree = array_pop($this->stack);
            if($tree->right != null)
                array_push($this->stack, $tree->right);

            if($tree->left != null) {
                $left = $tree->left;
                $tree->right = null;
                $tree->left = null;
                array_push($this->stack, $tree);
                array_push($this->stack, $left);
            } else {
                array_push($this->orders, $tree->val);
            }
        }
    }

}