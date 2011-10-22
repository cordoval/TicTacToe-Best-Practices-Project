<?php

class TurnSwitcher
{
    public function flips() {
        // flips turnToPlayer
        if ($this->turnToPlayer == 1) {
            $this->turnToPlayer() = 2;
        } else {
            $this->turnToPlayer() = 1;
        }

        return $playerInTurn;
    }

    public function getTotalMoves() {

        return $totalMoves;
    }
}
