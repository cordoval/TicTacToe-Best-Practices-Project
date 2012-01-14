<?php

namespace PHPPeru\TicTacToe;

use PHPPeru\TicTacToe\PlayerCollection;
use PHPPeru\TicTacToe\Player;

/**
 * TurnSwitcher's responsibility is to return the player in turn
 */
class TurnSwitcher
{
    protected $currentPlayer;
    protected $players = null;
    protected $totalMoves;

    public function __construct() {
        $this->players = new PlayerCollection(new \ArrayIterator(array()));
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
