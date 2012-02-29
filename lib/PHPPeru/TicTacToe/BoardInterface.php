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
interface BoardInterface
{
    /**
     * Marks position played with a given symbol
     *
     * @param mixed $position       The position played
     * @param string $symbol        The symbol to mark
     *
     * @throws Exception   when position is not valid and position is not null/empty
     */
    function markSymbolInPosition($symbol, $position);

    /**
     * Gets symbol in given position
     *
     * @param mixed $position       The position of interest
     *
     * @return string               The symbol bound to given position
     *
     * @throws Exception   when position is not valid
     */
    function getSymbolInPosition($position);

    /**
     * Flags if Board is full and there is no other position to mark
     *
     * @return boolean              True or false if board is full
     */
    function isFull();

    /**
     * Loops over the board positions and gets first null/available position
     *
     * @return mixed                The available position
     *
     * @throws Exception   when was no available position
     */
    function getAvailablePosition();

    /**
     * Validates if position is a valid key within board positions
     *
     * @param $position
     *
     * @return boolean              True or false if position is valid key of board
     */
    function isPositionValid($position);
}

