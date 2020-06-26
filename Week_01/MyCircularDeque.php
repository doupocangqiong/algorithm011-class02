<?php
class MyCircularDeque {

    private $k = null;
    private $now = 0;
    private $deque = [];
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->k = $k;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if (($this->now + 1) > $this->k) return false;
        array_unshift($this->deque, $value);
        $this->now ++;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->now + 1 > $this->k) return false;
        array_push($this->deque, $value);
        $this->now ++;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if($this->now - 1 < 0) {
            return false;
        }
        $value = array_shift($this->deque);
        $this->now --;
        return isset($value)?true: false;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if($this->now - 1 < 0) return false;
        $value = array_pop($this->deque);
        $this->now --;
        return isset($value)?true: false;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        return isset($this->deque[0])? $this->deque[0]: -1;
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        return isset($this->deque[$this->now-1])? $this->deque[$this->now-1]:-1;
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->now == 0;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return $this->now >= $this->k;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */