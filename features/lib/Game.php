<?php

/**
 * Central Class from where dispatcher is used
 */
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

/**
 * Game class
 *
 * Is the master class from where the game is played.
 * It executes the game with a main run method.
 * The API is defined through a subset of Game methods defined in this class.
 *
 */
class Game
{
    const PLAYER_WINS = 1;
    const KEEP_PLAYING = 0;
    const INVALID_POSITION = -1;

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
        while(!self::PLAYER_WINS == $this->play($positon, $player)) {
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

            // fire up the event
            $eventDispatcher->notify(
                new Event(null, 'xyz') // no subject so sets to null
            );

        }
    }

    public function play($position, $player) {
        if (!$position->isValidFor($player)) {
            return self::INVALID_POSITION;
        }

        $player->takeFieldAt($position);

        $player->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;
    }


}
