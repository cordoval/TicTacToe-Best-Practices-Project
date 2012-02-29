<?php

namespace PHPPeru\TicTacToe\Spec;

use PHPPeru\TicTacToe\Board;

class DescribeBoard extends \PHPSpec\Context
{
    protected $board;

    function before()
    {
        $this->board = $this->spec(new Board());
    }

    function itMarksAPositionAsTakenWhenThePlayerChosesAPosition()
    {
       $position = 1;
       $this->board->markSymbolInPosition('x', $position);
       $this->board->getSymbolInPosition($position)->should->be('x');
    }

    function itMarksAPositionWhenNotTaken()
    {
       $position = 1;
       $this->board->getSymbolInPosition($position)->should->beNull();
       $this->board->markSymbolInPosition('x', $position);
       $this->board->getSymbolInPosition($position)->should->be('x');
    }

    function itWillAllowMarkingAPositionThatHasNotBeenTaken()
    {
        $position = 1;
        $board = $this->board;
        $this->spec(function() use ($board, $position) {
            $board->getSymbolInPosition($position);
        })->shouldNot->throwException('Exception');
    }

    function itWillNotAllowMarkingAPositionThatHasBeenTaken()
    {
        $position = 1;
        $board = $this->board;
        $this->board->markSymbolInPosition('x', $position);
        $this->spec(function() use ($board, $position) {
            $board->markSymbolInPosition('x', $position);
        })->should->throwException('Exception');
    }

    function itShouldIndicateIfFull()
    {
        $positions = array(0,1,2,3,4,5,6,7,8);
        foreach ($positions as $position) {
            $this->board->markSymbolInPosition('x', $position);
        }
        $this->board->isFull()->should->beTrue();
    }

    function itShouldIndicateIfNotFull()
    {
        $positions = array(0,1,2,3,4,5,7,8);
        foreach ($positions as $position) {
            $this->board->markSymbolInPosition('x', $position);
        }
        $this->board->isFull()->should->beFalse();
    }

    function itShouldProvideAvailablePosition()
    {
        $positions = array(0,1,2,4,5,7,8);
        foreach ($positions as $position) {
            $this->board->markSymbolInPosition('x', $position);
        }
        $this->board->getAvailablePosition()->should->be(3);
    }

    function itShouldFireUpExceptionForNoAvailablePosition()
    {
        $positions = array(0,1,2,3,4,5,6,7,8);
        foreach ($positions as $position) {
            $this->board->markSymbolInPosition('x', $position);
        }

        $board = $this->board;

        $this->spec(function() use ($board) {
            $board->getAvailablePosition();
        })->should->throwException('Exception', 'Could not find position, board is full.');
    }

    function itShouldValidatePositionPassedtoMarkPositionAndGetPosition()
    {
        $board = $this->board;
        $position = -1;

        $this->spec(function() use ($board, $position) {
            $board->markSymbolInPosition('x', $position);
        })->should->throwException('Exception', "Invalid position {$position}.");

        $this->spec(function() use ($board, $position) {
            $board->getSymbolInPosition($position);
        })->should->throwException('Exception', "Invalid position {$position}.");
    }

    function xitShouldIndicateWinningPattern()
    {
        $this->board->haveWinner()->should->beFalse();
        $this->board->markWinningPattern();
        $this->board->haveWinner()->should->beTrue();
    }
}