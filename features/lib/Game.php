<?php

/**
 * Central Class from where dispatcher is used
 */
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Game\TurnSwitcherInterface;

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
    protected $playerOrderList; // list to be traversed by turnSwitcher
    /* to-do $this->turnSwitcher->init($playerOrder) */
    protected $currentPlayer;

    protected $boardSack;

    protected $dispatcher = null;

    public function __construct(EventDispatcher $dispatcher, TurnSwitcher $turnSwitcher)
    {
        $this->dispatcher = $dispatcher;
        $this->turnSwitcher = $turnSwitcher;

        // to-do : playerCreator has to be injected
        $positionSelector = new PositionSelector();
        $fieldTaker = new FieldTaker($positionSelector);
        
        // assign players
        $this->turnSwitcher->addPlayer(new Player('x', $fieldTaker));
        $this->turnSwitcher->addPlayer(new Player('o', $fieldTaker));

        $this->currentPlayer = $this->turnSwitcher->getFirstPlayer();
    }

    public function run() {
        while(!self::PLAYER_WINS == $this->play(
            $this->currentPlayer->getNewPosition()
            )
        ) {
            // tod-do: possible hooks
        }
    }

    public function anyPlayOnce() {
        while($this->play($this->currentPlayer->getNewPosition()) == self::INVALID_POSITION) {}

    }

    public function play($position) {

        if (!$this->currentPlayer->canPlayInPosition($position)) {
            return self::INVALID_POSITION;
            echo 'returns invalid';
        }

        $this->currentPlayer->takeFieldAt($position);

        $result = $this->currentPlayer->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;

        $this->currentPlayer = $this->turnSwitcher->nextPlayer();

        return $result;

    }

    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

}
