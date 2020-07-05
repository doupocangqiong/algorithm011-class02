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

    public $orders = [];

    public $stack = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        array_push($this->orders, $root->val);

        if($root->left != null) {
            array_push($this->stack, $root->left);
            $this->tranverse();
        }

        if($root->right != null) {
            array_push($this->stack, $root->right);
            $this->tranverse();
        }
        return $this->orders;
    }

    function tranverse()
    {
        while(count($this->stack) > 0)
        {
            $current = array_pop($this->stack);
            array_push($this->orders, $current->val);
            if($current->right != null) {
                array_push($this->stack, $current->right);
            }
            if($current->left != null) {
                array_push($this->stack, $current->left);
            }

        }
    }


}