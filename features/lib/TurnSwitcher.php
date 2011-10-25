<?php

require_once __DIR__.'/../lib/PlayerCollection.php';
require_once __DIR__.'/../lib/Player.php';

class TurnSwitcher
{
    /**
     * TurnSwitcher's responsibility is to return the player in turn
     */
    protected $currentPlayer;
    protected $players = null;
    protected $totalMoves;

    public function __construct() {
        $this->players = new PlayerCollection(new ArrayIterator(array()));
    }
    
    public function getTotalMoves() {
        return $this->totalMoves;
    }

    public function nextPlayer() {
        return $this->players->next();
    }

    public function addPlayer(Player $player) {
        $this->players->add($player);
    }

    public function getFirstPlayer() {
        return $this->players->first();
    }
}
