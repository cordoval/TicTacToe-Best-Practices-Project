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
        if($this->_board[$position] == null)
        {
            $this->_board[$position] = $symbol;
            return true;
        }
        return false;
    }

    public function getPosition($position)
    {
        return $this->_board[$position];
    }

    public function isFull()
    {
        return true;
    }
}

