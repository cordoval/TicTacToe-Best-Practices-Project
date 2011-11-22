<?php

namespace PHPPeru\TicTacToe\lib;

/**
 * FilterSwitcherEvent
 */
class FilterSwitcherEvent extends Event
{
    protected $order;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function getPlayer()
    {
        return $this->player;
    }
}