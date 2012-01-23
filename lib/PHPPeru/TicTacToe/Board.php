<?php

namespace PHPPeru\TicTacToe;

class Board
{
    protected $_board = array(
                            null,null,null,
                            null,null,null,
                            null,null,null,
                        );

    public function markPosition($position, $symbol)
    {
        $this->_board[$position] = $symbol;
    }

    public function getPosition($position)
    {
        return $this->_board[$position];
    }
}

