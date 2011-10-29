<?php

/*
 * Player Class
 */

require_once __DIR__.'/../lib/Bag.php';

class Player
{
    protected $symbol;
    protected $fieldTaker;

    protected $bag;

    public function __construct($symbol, $fieldTaker) {
        $this->symbol = $symbol;
        $this->fieldTaker = $fieldTaker;
        $this->bag = new Bag();
    }

    public function asksIfSheWon() {
        if ($this->bag->containsWinnerSnapshot()) {
            return true;
        } else {
            return false;
        }
    }

    public function getNewPosition() {
        return 1; // to-do: $this->positionSelector->popPosition();
    }

    public function canPlayInPosition($position) {
        // finds position in game's bag returns true
        return $this->bag->findPosition($position);
    }

    public function takeFieldAt($position) {
        // set current position in player's bag
        // unset current position in game's bag
        return $this->fieldTaker->take();
    }

}

