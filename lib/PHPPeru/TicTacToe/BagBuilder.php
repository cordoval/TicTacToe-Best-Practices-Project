<?php

namespace PHPPeru\TicTacToe;

/**
 * Bag Builder responsibility is to build a board for game
 * or an empty bag for a player at starting time
 */
class BagBuilder
{
    protected $bag;

    public function __construct() {
        $this->bag = array();
    }
}

