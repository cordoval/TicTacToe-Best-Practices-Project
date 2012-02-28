<?php

namespace PHPPeru\TicTacToe;

class Player
{
    function getSymbol()
    {
        return $this->symbol;
    }

    function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }
}