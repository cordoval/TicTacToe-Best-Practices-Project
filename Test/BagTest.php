<?php

namespace Test;

use PHPPeru\TicTacToe\Bag;

class BagTest extends \PHPUnit_Framework_TestCase
{
    protected $bag;

    public function setUp() {
        $this->bag = new Bag();
    }

    /**
     * @test
     */
    public function canFindPositionWhenSet(){
        $this->bag->setPosition(8);
        $this->assertTrue($this->bag->findPosition(8));
    }

    /**
     * @test
     */
    public function cantFindPositionWhenNotSet(){
        $this->bag->unsetPosition(9);
        $this->assertFalse($this->bag->findPosition(9));
    }

    /**
     * @test
     */
    public function containsWinnerSnapshot(){
        $this->bag->setPosition(1);
        $this->bag->setPosition(2);
        $this->bag->setPosition(3);
        $this->assertTrue($this->bag->containsWinnerSnapshot());
    }

    /**
     * @test
     */
    public function failContainsWinnerSnapshot(){
        $this->bag->setPosition(1);
        $this->bag->setPosition(2);
        $this->bag->setPosition(4);
        $this->assertFalse($this->bag->containsWinnerSnapshot());
    }

    /**
     * @test
     */
    public function verifySetPosition(){
        $this->bag->setPosition(6);
        $this->assertTrue($this->bag->findPosition(6));
    }

    /**
     * @test
     */
    public function verifyUnsetPosition(){
        $this->bag->setPosition(7);
        $this->bag->unsetPosition(7);
        $this->assertFalse($this->bag->findPosition(7));
    }

}