<?php

namespace PHPPeru\TicTacToe\Spec;

use PHPPeru\TicTacToe\GameEngine;

class DescribeGameEngine extends \PHPSpec\Context
{
    protected $game;

    function before()
    {
        $this->game = $this->spec(new GameEngine());
    }

    function itShouldBeAbleToTakeInPlayers()
    {
        $this->game->addPlayer($player)->should->beTrue();
    }

    function itShouldBeAbleToTakeInRules()
    {
        $this->pending();
    }

    function itShouldBeAbleToTakeInEndConditions()
    {
        $this->pending();
    }

    function itShouldBeAbleToIndicateWhoseTurnIs()
    {
        $this->pending();
    }

    function itShouldBeAbleToValidateRules()
    {
        $this->pending();
    }

    function itShouldBeAbleToTellIfGameIsFinished()
    {
        $this->pending();
    }

    function itShouldBeAbleToStoreWinners()
    {
        $this->pending();
    }

    function itShouldBeAbleToStoreLosers()
    {
        $this->pending();
    }
}