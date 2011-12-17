<?php

namespace Test;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
//die(var_export(__DIR__.'/../features/bootstrap/bootstrap.php'));
require_once __DIR__ . '/../features/bootstrap/bootstrap.php';

use PHPPeru\TicTacToe\TurnSwitcher;
use PHPPeru\TicTacToe\Player;
use PHPPeru\TicTacToe\Bag;
use PHPPeru\TicTacToe\PositionSelector;

class turnSwitcherTest extends \PHPUnit_Framework_TestCase
{
    protected $turnSwitcher;
    protected $player1;
    protected $player2;

    public function setUp()
    {
        $fieldTaker = $this->getFieldTaker();
        $this->turnSwitcher = new TurnSwitcher();
        $this->player1 = new Player('x', $fieldTaker);
        $this->player2 = new Player('o', $fieldTaker);
        $this->turnSwitcher->addPlayer($this->player1);
        $this->turnSwitcher->addPlayer($this->player2);
    }

    public function testStartsWithXSymbol()
    {
        $player = $this->turnSwitcher->getFirstPlayer();
        $this->assertEquals('x', $player->getSymbol());
    }

    public function testFailStartWithXSymbol()
    {
        $player = $this->turnSwitcher->getFirstPlayer();
        $this->assertNotEquals('o', $player->getSymbol());
    }

    public function getFieldTaker()
    {
        $positionSelector = new PositionSelector();
        $gameBag = new Bag();
        $playerBag = new Bag();
        return $this->getMock('\PHPPeru\TicTacToe\FieldTaker', null, array($positionSelector, $gameBag, $playerBag));
    }

    public function testFirstInputFirstOutput(){
        $this->assertEquals($this->turnSwitcher->getFirstPlayer(), $this->player1);
    }

    public function testCyclingPlayers(){
            $player = $this->turnSwitcher->nextPlayer();
            $this->turnSwitcher->nextPlayer();
            $newPlayer = $this->turnSwitcher->nextPlayer();
            $this->assertEquals($player, $newPlayer);
        }
}