<?php
class Trie {

    private $root;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root = new TrieNode(null);
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $length = strlen($word);
        $current = $this->root;
        if($length > 0) {
            for($i = 0; $i < $length; $i ++) {
                if(!isset($current->subs[$word[$i]])) {
                    $current->subs[$word[$i]] = new TrieNode($word[$i]);
                }
                $current = $current->subs[$word[$i]];
            }
            $current->isWord = true;
        }

    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $length = strlen($word);
        $current = $this->root;
        if($length > 0) {
            for($i = 0; $i < $length; $i ++) {
                if(!isset($current->subs[$word[$i]])) {
                    return false;
                }
                $current = $current->subs[$word[$i]];
            }
            return $current->isWord;
        }
        return $this;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $length = strlen($prefix);
        $current = $this->root;
        if($length > 0) {
            for($i = 0; $i < $length; $i ++) {
                if(!isset($current->subs[$prefix[$i]])) {
                    return false;
                }
                $current = $current->subs[$prefix[$i]];
            }
            return true;
        }
        return true;
    }
}
class TrieNode
{
    public $val;
    public $subs;
    public $isWord;
    public function __construct($val = null)
    {
        $this->val = $val;
        $this->subs = [];
        $this->isWord = false;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */