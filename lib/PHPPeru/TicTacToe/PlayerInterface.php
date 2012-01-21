<?php

namespace PHPPeru\TicTacToe;

interface PlayerInterface
{
    function asksIfSheWon();

    function canPlayInPosition($position);

    function takeFieldAt($position);

    function setGameBag($gameBag);

    function getGameBag();

    function getBag();

    function setBag();

    function getSymbol();

    function setSymbol($symbol);
}

