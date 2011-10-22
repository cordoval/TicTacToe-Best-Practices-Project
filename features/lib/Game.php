<?php

/**
 * Central Class from where dispatcher is used
 */
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

class Game
{
    protected $turnSwitcher;
    protected $turnToPlayer = 1;
    protected $players;

    protected $boardSack;

    protected $dispatcher = null;

    public function __construct(EventDispatcher $dispatcher, $turnSwitcher)
    {
        $this->dispatcher = $dispatcher;
        $this->turnSwitcher = $turnSwitcher;
    }

    public function run() {
        while(1) {
            $turnToPlayer = $this->turnSwitcher->flip($turnToPlayer);
            if ($turnToPlayer == 1) {
                $this->oPlayer->mark();
            } elseif($turnToPlayer == 2) {
                $this->xPlayer->mark();
            } else {
                // throw exception for wrong turnSwitcher algorithm
            }
            $winnerOrDraw = $this->gameChecker->checkIsOver();
            if ($winnerOrDraw) {
                exit;
            }

            // create dispatcher service
            $dispatcher = new EventDispatcher();

            // creating listener
            $listener = new TurnSwitcherListener();

            // register the event
            $dispatcher->addListener('turnswitcher.action', array($listener, 'onTurnSwitcherAction'), 0);

            // register the event - closure form
            //$dispatcher->addListener('turnswitcher.action', function(Event $event) {
            //   echo 'I handle event '.$event->getName();
            //}, 0 ); // 0 priority

            // fire up the event
            $eventDispatcher->notify(
                new Event(null, 'xyz') // no subject so sets to null
            );

        }
    }


}
