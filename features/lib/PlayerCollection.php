<?php

class PlayerCollection implements IteratorAggregate {

    protected $iterator;

    public function __construct() {
        $this->iterator = new ArrayIterator();
    }

    public function getIterator() {
        return new InfiniteIterator($this->iterator);
    }
    
}
