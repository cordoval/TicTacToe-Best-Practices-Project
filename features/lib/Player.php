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

    public function __construct($symbol, FieldTaker $fieldTaker) {
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
        throw new Exception(sprintf('not implemented %s', __METHOD__));
    }

    public function canPlayInPosition($position) {
        if ($position == null) {
            // not overriding position so assume valid
            return true;
        }
        // finds position in game's bag returns true
        return $this->bag->findPosition($position);
    }

    public function takeFieldAt($position = null) {
        // set current position in player's bag
        $this->bag->setPosition($position);
        // unset current position in game's bag
        return $this->fieldTaker->take($position);
    }

}

