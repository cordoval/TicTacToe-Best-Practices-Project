<?php

namespace Test;

use PHPPeru\TicTacToe\Bag;
use PHPPeru\TicTacToe\Player;
use PHPPeru\TicTacToe\TurnSwitcher;
use PHPPeru\TicTacToe\PositionSelector;
use PHPPeru\TicTacToe\FieldTaker;

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    protected $player;
    protected $positionSelector;
    protected $turnSwitcher;
    protected $gameBag;
    protected $playerBag;
    protected $fieldTaker;

    public function setUp() {
        $this->turnSwitcher = new TurnSwitcher();
        $this->positionSelector = new PositionSelector();
        $this->gameBag = new Bag();
        $this->playerBag = new Bag();
        $this->fieldTaker = new FieldTaker($this->positionSelector, $this->gameBag, $this->playerBag);
        $this->player = new Player('x', $this->fieldTaker);
    }

    /**
     * @test
     */
    public function canFindPositionWhenSet(){
        /** @var $player \PHPPeru\TicTacToe\Player **/
        $this->markTestIncomplete("wip for Player class");
    }
}