<?php

namespace PHPPeru\TicTacToe;

use PHPPeru\TicTacToe\Bag;
use PHPPeru\TicTacToe\PlayerInterface;

/*
 * Player responsibility is to house the functionality
 * for 1 player within the game framework
 */
class Player implements PlayerInterface
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

    public function canPlayInPosition($position) {
        return $this->gameBag->findPosition($position);
    }

    public function takeFieldAt($position = null) {
        if ($this->canPlayInPosition($position) == true) {
            $this->fieldTaker->transferField($position);
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

