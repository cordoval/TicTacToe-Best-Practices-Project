<?php

namespace PHPPeru\TicTacToe;

use PHPPeru\TicTacToe\PlayerCollection;

class GameEngine
{
    protected $players;

    public function __construct() {
        //$this->players = new PlayerCollection(new \ArrayIterator(array()));
    }

    public function addPlayer($player)
    {
        //$this->players->add($player);
    }

    public function getCurrentPlayer()
    {
        //return $this->players->current();
    }
}