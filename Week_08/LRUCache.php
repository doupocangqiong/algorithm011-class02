<?php
class LRUCache {

    private $capacity;
    private $map;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->map = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->map[$key])) {
            $value = $this->map[$key];
            unset($this->map[$key]);
            $this->map[$key] = $value;
            return $value;
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(isset($this->map[$key])) {
            unset($this->map[$key]);
        } else {
            if(count($this->map) >= $this->capacity) {
                $deleteKey = key($this->map);
                unset($this->map[$deleteKey]);
            }
        }
        $this->map[$key] = $value;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */