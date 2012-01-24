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
        foreach($this->_board as $position)
        {
            if($position == null)
            {
                return false;
            }
        }
        return true;
    }

    public function getAvailablePosition()
    {
        return 3;
    }
}

