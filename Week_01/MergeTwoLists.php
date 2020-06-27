<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $newLink = new ListNode(0);
        $cursor1 = $l1;
        $cursor2 = $l2;
        if($cursor1 == null && $cursor2 == null) { // 判断两个链表是否为空的情况
            return null;
        } elseif($cursor1 == null && $cursor2 != null) {
            $newLink->next = $cursor2;
            $current = $newLink->next;
            $cursor2 = $cursor2->next;
        } elseif($cursor1 != null && $cursor2 == null) {
            $newLink->next = $cursor1;
            $current = $newLink->next;
            $cursor1 = $cursor1->next;
        } else {
            if($cursor1->val <= $cursor2->val) {
                $newLink->next = $cursor1;
                $current = $newLink->next;
                $cursor1 = $cursor1->next;
            } else {
                $newLink->next = $cursor2;
                $current = $newLink->next;
                $cursor2 = $cursor2->next;
            }
        }
        while($cursor1 && $cursor2)
        {
            if($cursor1->val <= $cursor2->val) {
                $current->next = $cursor1;
                $cursor1 = $cursor1->next;
                $current = $current->next;
            } else {
                $current->next = $cursor2;
                $cursor2 = $cursor2->next;
                $current = $current->next;
            }

        }
        while($cursor1 && !$cursor2)
        {
            $current->next = $cursor1;
            $cursor1 = $cursor1->next;
            $current = $current->next;
        }
        while($cursor2 && !$cursor1)
        {
            $current->next = $cursor2;
            $cursor2 = $cursor2->next;
            $current = $current->next;
        }
        return $newLink->next;
    }
}