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
        //return $
    }

    public function containsWinnerSnapshot() {
        // if it is an horizontal triplet
        //return $this->positions[1] == 1 || $this->positions[2] == 1 || $this->positions[3] == 1;
        return 0;

        // if it is an vertical triplet

        // if it is a diagonal triplet
        
    }

    //return $this->fieldTaker->take();
    // fielTaker->take unsets from game bag and sets same key on player's bag
}
