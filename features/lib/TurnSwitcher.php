<?php

class TurnSwitcher
{
    /**
     * TurnSwitcher's responsibility is to return the player in turn
     */
    protected $currentPlayer;
    protected $players;

    public function __construct() {
        $players = new Players();
    }
    
    public function getTotalMoves() {
        return $totalMoves;
    }

    public function nextTo($player) {

        /**
         * to-do: seek the current $player within the list/array
         * return the next player within the list & loop
         */
        return $this->players->next();
    }

    public function addPlayer($player) {
        $players[] = $player;
    }

    public function getFirstPlayer() {
        return 1;
    }
}
