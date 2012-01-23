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
       $this->board->markPosition(1, 'X');
       $this->board->getPostion(1)->should->be('X');
    }
}