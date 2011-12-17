<?php

namespace PHPPeru\TicTacToe;

class Bag
{
    protected $positions = array();

    public function findPosition($position) {
        return isset($this->positions[$position]);
    }

    public function setPosition($position) {
        $this->positions[$position] = 1;
    }

    public function unsetPosition($position) {
        unset($this->positions[$position]);
    }

    public function containsWinnerSnapshot() {

        $keys = array('1','2','3');
        foreach ($keys as $key) {
            if (!array_key_exists($key, $this->positions)) {
                return false;
            }
        }
        return true;

        // if it is an horizontal triplet

        // if it is an vertical triplet

        // if it is a diagonal triplet
    }
}
