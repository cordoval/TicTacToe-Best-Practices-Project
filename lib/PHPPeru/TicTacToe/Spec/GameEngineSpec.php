<?php

namespace PHPPeru\TicTacToe\Spec;

use PHPPeru\TicTacToe\GameEngine;
use \Mockery as m;

class DescribeGameEngine extends \PHPSpec\Context
{
    protected $game;

    function before()
    {
        $this->game = $this->spec(new GameEngine());
    }

    function itShouldBeAbleToTakeInPlayers()
    {
        $player = m::mock('PlayerInterface');
        $this->game->addPlayer($player)->should->beTrue();
    }

    function xitShouldBeAbleToTakeInRules()
    {
        $this->pending();
    }

    function xitShouldBeAbleToTakeInEndConditions()
    {
        $this->pending();
    }

    function xitShouldBeAbleToIndicateWhoseTurnIs()
    {
        $this->pending();
    }

    function xitShouldBeAbleToValidateRules()
    {
        $this->pending();
    }

    function xitShouldBeAbleToTellIfGameIsFinished()
    {
        $this->pending();
    }

    function xitShouldBeAbleToStoreWinners()
    {
        $this->pending();
    }

    function xitShouldBeAbleToStoreLosers()
    {
        $this->pending();
    }
}