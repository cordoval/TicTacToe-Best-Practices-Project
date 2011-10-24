<?php

class PlayerCollection extends InfiniteIterator {

    protected $players;
    protected $arrayIterator;

    public function __construct($arrayIterator) {
        $this->arrayIterator = $arrayIterator;
    }

    public function getIterator() {
        return $this->arrayIterator;
    }

    public function add($value) {
        $this->players[] = $value;
    }

    public function first() {
        return $this->players[0];
    }
}
