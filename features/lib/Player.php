<?php

class Player
{
    protected $symbol;
    protected $fieldTaker;

    protected $sack;

    public function __construct($symbol, $fieldTaker) {
        $this->symbol = $symbol;
        $this->fieldTaker = $fieldTaker;
    }

    public function asksIfSheWon() {

        // if gameOver criteria is met
        return true;

        // if gameOver criteria is NOT met
        return false;
    }

    /*
    public function mark() {

        // returns true upon successful take
        return $this->fieldTaker->take();

        // and false on fail
    }
    */
}

