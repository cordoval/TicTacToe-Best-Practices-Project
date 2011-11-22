<?php

namespace PHPPeru\TicTacToe\lib;

/**
 * Events Class
 */
class GameEvents {

    /**
     * The turnswitcher.action event is thrown each time a turn has been
     * completed and it is time to switch turns with the other player.
     *
     * The event listener receives an Event\FilterSwitcherEvent
     * instance.
     *
     * @var string
     */
    const onTurnSwitch = 'turnswitcher.action';
}


