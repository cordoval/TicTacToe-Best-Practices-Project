<?php

namespace PHPPeru\TicTacToe\lib;

/**
 * Listener TurnSwitcher Class
 */
use Symfony\Component\EventDispatcher\Event;

class TurnSwitcherListener
{
    // ...
    public function onFinishPlay(Event $event)
    {
        throw new Exception(sprintf('not implemented %s', __METHOD__));
        // do something
    }
}