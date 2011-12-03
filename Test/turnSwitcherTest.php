<?php

namespace Test;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
//die(var_export(__DIR__.'/../features/bootstrap/bootstrap.php'));
require_once __DIR__ . '/../features/bootstrap/bootstrap.php';

use PHPPeru\TicTacToe\TurnSwitcher;
use PHPPeru\TicTacToe\Player;
use PHPPeru\TicTacToe\PositionSelector;

class turnSwitcherTest extends \PHPUnit_Framework_TestCase
{
    protected $turnSwitcher;

    public function setUp()
    {
        $fieldTaker = $this->getFieldTaker();
        $this->turnSwitcher = new TurnSwitcher();
        $this->turnSwitcher->addPlayer(new Player('x', $fieldTaker));
        $this->turnSwitcher->addPlayer(new Player('o', $fieldTaker));
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
        return $this->getMock('\PHPPeru\TicTacToe\FieldTaker', null, array($positionSelector));
    }
}