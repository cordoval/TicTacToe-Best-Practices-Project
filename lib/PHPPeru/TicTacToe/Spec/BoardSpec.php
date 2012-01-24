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
       $this->board->markPosition($position, 'x');
       $this->board->getPosition($position)->should->be('x');
    }

    function itMarksAPositionWhenNotTaken()
    {
       $position = 1;
       $this->board->getPosition($position)->should->beNull();
       $this->board->markPosition($position, 'x');
       $this->board->getPosition($position)->should->be('x');
    }

    function itWillAllowMarkingAPositionThatHasNotBeenTaken()
    {
        $position = 1;
        $this->board->markPosition($position, 'x')->should->beTrue();
    }

    function itWillNotAllowMarkingAPositionThatHasBeenTaken()
    {
        $position = 1;
        $this->board->markPosition($position, 'x')->should->beTrue();
        $this->board->markPosition($position, 'x')->should->beFalse();
    }

    function itShouldIndicateIfFull()
    {
        $positions = array(0,1,2,3,4,5,6,7,8);
        foreach($positions as $position)
        {
            $this->board->markPosition($position, 'x');
        }
        $this->board->isFull()->should->beTrue();
    }

    function itShouldIndicateIfNotFull()
    {
        $positions = array(0,1,2,3,4,5,7,8);
        foreach($positions as $position)
        {
            $this->board->markPosition($position, 'x');
        }
        $this->board->isFull()->should->beFalse();
    }

    function itShouldTellWhoseTurnToMark()
    {
        $player = $this->board->getCurrentPlayer();
        $this->board->markPosition($position, $player->getSymbol());
        $nextPlayer = $this->board->getCurrentPlayer()->should->not->be($player);
    }

    function xitShouldIndicateWinningPattern()
    {
        $this->board->haveWinner()->should->beFalse();
        $this->board->markWinningPattern();
        $this->board->haveWinner()->should->beTrue();
    }
}