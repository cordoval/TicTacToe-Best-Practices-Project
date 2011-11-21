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
    protected $gameBag;

    public function __construct($symbol, FieldTaker $fieldTaker) {
        $this->symbol = $symbol;
        $this->fieldTaker = $fieldTaker;
        $this->bag = new Bag();
    }

    public function asksIfSheWon() {
        return $this->bag->containsWinnerSnapshot();
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
        // unset current position in game's bag
        $unsetPosition = $this->fieldTaker->take($position);

        // set current position in player's bag
        $this->bag->setPosition($unsetPosition);
    }

    public function setGameBag($gameBag) {
        $this->gameBag = $gameBag;
    }

    public function getSymbol() {
        return $this->symbol;
    }

    public function setSymbol($symbol) {
        $this->symbol = $symbol;
    }
}

