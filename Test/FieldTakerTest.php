<?php

namespace Test;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
//die(var_export(__DIR__.'/../features/bootstrap/bootstrap.php'));
require_once __DIR__ . '/../features/bootstrap/bootstrap.php';

use PHPPeru\TicTacToe\Bag;
use PHPPeru\TicTacToe\FieldTaker;
use PHPPeru\TicTacToe\PositionSelector;

class FieldTakerTest extends \PHPUnit_Framework_TestCase
{
    protected $fieldTaker;
    protected $gameBag;
    protected $playerBag;

    public function setUp()
    {
        $positionSelector = new PositionSelector();
        $this->playerBag = new Bag();
        $this->gameBag = new Bag();
        $this->fieldTaker = new FieldTaker($positionSelector, $this->gameBag, $this->playerBag);
    }

    /**
     * @test
     */
    public function transferField()
    {
        $position = 1;
        $this->gameBag->setPosition($position);
        $this->fieldTaker->transferField($position);
        $this->assertFalse($this->gameBag->findPosition($position));
        $this->assertTrue($this->playerBag->findPosition($position));
    }

    /**
     * @test
     */
    public function transferNullField()
    {
        $position = 1;
        $this->gameBag->setPosition($position);
        $this->fieldTaker->transferField();
        $this->assertFalse($this->gameBag->findPosition($position));
        $this->assertTrue($this->playerBag->findPosition($position));
    }


}