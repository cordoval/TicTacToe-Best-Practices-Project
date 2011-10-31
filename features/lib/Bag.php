<?php

class Bag
{
    protected $positions = null;

    public function findPosition($position) {
        if($this->positions[$position]) {
            return true;
        } else {
            return false;
        }
    }

    public function setPosition($position) {
        $this->positions[$position] = 1;
    }

    public function containsWinnerSnapshot() {
        throw new Exception(sprintf('not implemented %s', __METHOD__));
    }

    //return $this->fieldTaker->take();
    // fielTaker->take unsets from game bag and sets same key on player's bag
}
