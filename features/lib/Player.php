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
        //$result = $this->gameBag->findPosition($position);
        //$boolarray = Array(false => 'false', true => 'true');
        //printf("\$this->bag->findPosition(%s) = %s \n", $position, $boolarray[$result] );
        // finds position in game's bag returns true
        return $this->gameBag->findPosition($position);
    }

    public function takeFieldAt($position = null) {

        if ($this->canPlayInPosition($position) == true) {
            // unset current position in game's bag
            $unsetPosition = $this->fieldTaker->take($position);

            // set current position in player's bag
            $this->bag->setPosition($unsetPosition);

            return true;
        } else {
            return false;
        }
    }

    public function setGameBag($gameBag) {
        $this->gameBag = $gameBag;
    }

    public function getGameBag() {
        return $this->gameBag;
    }

    public function getBag() {
        return $this->bag;
    }

    public function setBag() {
        return $this->bag;
    }

    public function getSymbol() {
        return $this->symbol;
    }

    public function setSymbol($symbol) {
        $this->symbol = $symbol;
    }
}

