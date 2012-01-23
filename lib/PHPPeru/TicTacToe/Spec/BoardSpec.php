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
       $this->board->markPosition(1, 'x');
       $this->board->getPosition(1)->should->be('x');
    }

    function itMarksAPositionWhenNotTaken()
    {
       $position = 1;
       $this->board->getPosition($position)->should->be('null');
       $this->board->markPosition($position, 'x');
       $this->board->getPosition(1)->should->be('x');
    }
}