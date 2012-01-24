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
}