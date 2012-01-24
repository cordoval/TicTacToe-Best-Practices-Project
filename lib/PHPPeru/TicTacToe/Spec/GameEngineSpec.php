<?php

namespace PHPPeru\TicTacToe\Spec;

use PHPPeru\TicTacToe\GameEngine;
use PHPPeru\TicTacToe\PlayerInterface;
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
        $player1 = m::mock('PHPPeru\TicTacToe\PlayerInterface');
        $player2 = m::mock('PHPPeru\TicTacToe\PlayerInterface');
        $this->game->getCurrentPlayer()->should->beFalse();
        $this->game->addPlayer($player1);
        $this->game->addPlayer($player2);
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