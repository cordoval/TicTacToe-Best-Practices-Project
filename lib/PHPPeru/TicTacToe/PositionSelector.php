<?php

namespace PHPPeru\TicTacToe;

/*
 * PositionSelector responsibility is to select field's
 * position that will be played on by player
 */
class PositionSelector
{
    public function __construct()
    {

    }

    public function getPosition() {
        // algorithm to determine position
        $selectedPosition = 1;

        return $selectedPosition;
    }
}
