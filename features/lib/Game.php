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
    const DRAW_GAME = -2;

    protected $turnSwitcher;
    protected $turnToPlayer = 1;
    protected $players;
    protected $playerOrderList; // list to be traversed by turnSwitcher
    /* to-do $this->turnSwitcher->init($playerOrder) */
    protected $currentPlayer;

    protected $gameBag;

    protected $dispatcher = null;

    public function __construct(EventDispatcher $dispatcher, TurnSwitcher $turnSwitcher)
    {
        $this->dispatcher = $dispatcher;
        $this->turnSwitcher = $turnSwitcher;

        // to-do : playerCreator has to be injected
        $positionSelector = new PositionSelector();
        $fieldTaker = new FieldTaker($positionSelector);
        
        // assign players
        $player1 = new Player('x', $fieldTaker);
        $player2 = new Player('o', $fieldTaker);

        $player1->setGameBag($this->gameBag);
        $player2->setGameBag($this->gameBag);
        
        $this->turnSwitcher->addPlayer($player1);
        $this->turnSwitcher->addPlayer($player2);

        $this->currentPlayer = $this->turnSwitcher->getFirstPlayer();

        $this->gameBag = new Bag();
    }

    public function run() {
        $turnNumber = 1;
        while(1) {

            $result = $this->play();

            if (self::PLAYER_WINS == $result || self::DRAW_GAME == $result) {
                return true;
            }
        }
        return true;
    }

    public function anyPlayOnce() {

        while($this->play() != self::INVALID_POSITION);

    }

    public function play($position = null) {

        if (!$this->currentPlayer->canPlayInPosition($position)) {
            return self::INVALID_POSITION;
        }

        $this->currentPlayer->takeFieldAt($position);

        $result = $this->currentPlayer->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;

        var_export($this->currentPlayer->getSymbol());

        $this->currentPlayer = $this->turnSwitcher->nextPlayer();

        return $result;
    }

    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    public function isGameOver() {
        return $this->currentPlayer->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;
    }
}
