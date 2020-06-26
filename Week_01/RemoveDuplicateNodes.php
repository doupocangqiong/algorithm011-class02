<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeDuplicateNodes($head) {
        $visited = [];

        $unique = new ListNode(0);
        $unique->next = $head;
        $previous = $unique;

        while($head) {
            $current = $head;
            if(!isset($visited[$head->val])) {
                $visited[$head->val] = true;
                $previous = $head;
            } else {
                $previous->next = $current->next;
            }
            $head = $head->next;
        }

        return $unique->next;
    }
}