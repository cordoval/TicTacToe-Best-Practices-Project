<?php

namespace PHPPeru\TicTacToe;

use PHPPeru\TicTacToe\Bag;

class FieldTaker
{
    protected $gameBag;
    protected $playerBag;

    public function __construct($positionSelector, $gameBag, $playerBag)
    {
        $this->positionSelector = $positionSelector;
        $this->gameBag = $gameBag;
        $this->playerBag = $playerBag;
    }

    public function transferField($position=null)
    {
        if (is_null($position)) {
            $position = $this->positionSelector->getPosition();
        }
        $this->gameBag->unsetPosition($position);
        $this->playerBag->setPosition($position);
    }
}