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