<?php

class Bag
{
    protected $symbol;
    protected $positionSelector;
    protected $fieldTaker;

    protected $sack;

    public function __construct($symbol, $fieldTaker) {
        $this->symbol = $symbol;
        $this->fieldTaker = $fieldTaker;
    }

    public function mark() {

        // returns true upon successful take
        return $this->fieldTaker->take();

        // and false on fail
    }
}

