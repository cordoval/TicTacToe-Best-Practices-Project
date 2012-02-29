<?php

/*
 * This file is part of the TicTacToe package.
 *
 * (c) phpperu.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPPeru\TicTacToe;

/**
 * Board
 *
 * @author     Luis Cordova <cordoval@gmail.com>
 */
class Board
{
    protected $_board = array(
                            null,null,null,
                            null,null,null,
                            null,null,null,
                        );

    /**
     * Marks position played with a given symbol
     *
     * @param mixed $position       The position played
     * @param string $symbol        The symbol to mark
     *
     * @throws Exception   when position is not valid and position is not null/empty
     */
    public function markSymbolInPosition($symbol, $position)
    {
        if ($this->isPositionValid($position) && $this->_board[$position] == null) {
             $this->_board[$position] = $symbol;
        } else {
            throw new \Exception("Invalid position {$position}.");
        }
    }

    /**
     * Gets symbol in given position
     *
     * @param mixed $position       The position of interest
     *
     * @return string               The symbol bound to given position
     *
     * @throws Exception   when position is not valid
     */
    public function getSymbolInPosition($position)
    {
        if ($this->isPositionValid($position)) {
            return $this->_board[$position];
        } else {
            throw new \Exception("Invalid position {$position}.");
        }
    }

    /**
     * Flags if Board is full and there is no other position to mark
     *
     * @return boolean              True or false if board is full
     */
    public function isFull()
    {
        foreach ($this->_board as $position) {
            if ($position == null) {
                return false;
            }
        }
        return true;
    }

    /**
     * Loops over the board positions and gets first null/available position
     *
     * @return mixed                The available position
     *
     * @throws Exception   when was no available position
     */
    public function getAvailablePosition()
    {
        $position = null;
        foreach ($this->_board as $field => $value) {
            if ($value == null) {
                $position = $field;
                break;
            }
        }

        if ($position != null) {
            return $position;
        }

        throw new \Exception('Could not find position, board is full.');
    }

    /**
     * Validates if position is a valid key within board positions
     *
     * @param $position
     *
     * @return boolean              True or false if position is valid key of board
     */
    public function isPositionValid($position)
    {
        if (array_key_exists($position, $this->_board)) {
            return true;
        }
        return false;
    }
}

