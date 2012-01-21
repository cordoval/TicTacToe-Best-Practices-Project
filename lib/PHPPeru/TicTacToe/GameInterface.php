<?php

namespace PHPPeru\TicTacToe;

interface GameInterface {
    function run();

    function anyPlayOnce();

    function play($position);

    function getCurrentPlayer();

    function isGameOver();

    function addPlayer($player);

    function addRule($rule);

    function hasMarkerAt($position);

    function isPlayersTurn($player);

    function getPlacementRules();

    function placeMarker($position, $player);

    function nextTurn();

    function getWinConditions();

    function addWinners($winners);

    function getLossConditions();

    function addLosers($losers);

    function getEndConditions();

    function setFinished($booleanValue);

    function isFinished();
}