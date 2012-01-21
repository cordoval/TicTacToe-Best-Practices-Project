<?php

namespace PHPPeru\TicTacToe;

use PHPPeru\TicTacToe\TurnSwitcherInterface;
use PHPPeru\TicTacToe\GameInterface;

/**
 * Game class
 *
 * Is the master class from where the game is played.
 * It executes the game with a main run method.
 * The API is defined through a subset of Game methods defined in this class.
 *
 */
class Game implements GameInterface
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
    protected $playerBag;
    protected $gameBag;

    protected $dispatcher = null;

    public function __construct(TurnSwitcher $turnSwitcher)
    {
        $this->turnSwitcher = $turnSwitcher;

        $this->gameBag = new Bag();
        $this->playerBag = new Bag();
        // to-do : playerCreator has to be injected
        $positionSelector = new PositionSelector();
        $fieldTaker = new FieldTaker($positionSelector, $this->gameBag, $this->playerBag);
        
        // assign players
        $player1 = new Player('x', $fieldTaker);
        $player2 = new Player('o', $fieldTaker);

        $player1->setGameBag($this->gameBag);
        $player2->setGameBag($this->gameBag);
        
        $this->turnSwitcher->addPlayer($player1);
        $this->turnSwitcher->addPlayer($player2);

        $this->currentPlayer = $this->turnSwitcher->getFirstPlayer();
    }

    public function run()
    {
        while(1) {

            $result = $this->play();

            if (self::PLAYER_WINS == $result || self::DRAW_GAME == $result) {
                return true;
            }
        }
        return true;
    }

    public function anyPlayOnce()
    {
        while($this->play() == self::INVALID_POSITION);
    }

    public function play($position = null)
    {

        if (!$this->currentPlayer->canPlayInPosition($position)) {
            return self::INVALID_POSITION;
        }

        $this->currentPlayer->takeFieldAt($position);

        $result = $this->currentPlayer->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;

        //var_export($this->currentPlayer->getSymbol());

        $this->currentPlayer = $this->turnSwitcher->nextPlayer();

        return $result;
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    public function isGameOver()
    {
        return $this->currentPlayer->asksIfSheWon() ? self::PLAYER_WINS : self::KEEP_PLAYING;
    }

    public function addPlayer($player)
    {
        $this->turnSwitcher->addPlayer($player);
    }

    public function addRule($rule)
    {
        $this->turnSwitcher->addRule($rule);
    }

    public function hasMarkerAt($position)
    {
        return $this->gameBag->findPosition($position);
    }

    public function isPlayersTurn($player)
    {
        return $this->currentPlayer == $player;
    }

    public function getPlacementRules()
    {
        return array();
    }

    public function placeMarker($position, $player)
    {
        if($this->currentPlayer == $player) {
            $this->currentPlayer->takeFieldAt($position);
        } else {
            throw Exception("The player trying to place a marker is not current player.");
        }
    }

    public function nextTurn()
    {
        $this->currentPlayer = $this->turnSwitcher->nextPlayer();
    }

    public function getWinConditions()
    {
        
    }
}
