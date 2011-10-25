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
        return false;

        // if gameOver criteria is NOT met
        return true;
    }


    public function getNewPosition() {
        return 1; // to-do: $this->positionSelector->popPosition();
    }

    public function canPlayInPosition() {
        return 1;
    }

    public function takeFieldAt($position) {
        
        return 1;
    }
    /*
    public function mark() {

        // returns true upon successful take
        return $this->fieldTaker->take();

        // and false on fail
    }
    */
}

