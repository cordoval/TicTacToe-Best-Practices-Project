<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    protected $game;
    protected $oPlayer;
    protected $xPlayer;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {

        $fieldTaker = new FieldTaker(new PositionSelector());
        // Initialize your context here
        $this->oPlayer = new Player('o', $fieldTaker);
        $this->xPlayer = new Player('x', $fieldTaker);
        $this->game = new Game(new TurnSwitcher());
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//

    /**
     * @When /^Game is playing$/
     */
    public function gameIsPlaying()
    {
        throw new PendingException();
    }

    /**
     * @Given /^One completes three fields in a row with same symbol$/
     */
    public function oneCompletesThreeFieldsInARowWithSameSymbol()
    {
        throw new PendingException();
    }

    /**
     * @Then /^an horizontal triplet has been made$/
     */
    public function anHorizontalTripletHasBeenMade()
    {
        throw new PendingException();
    }

    /**
     * @Given /^One completes three fields in a column with same symbol$/
     */
    public function oneCompletesThreeFieldsInAColumnWithSameSymbol()
    {
        throw new PendingException();
    }

    /**
     * @Then /^a vertical triplet has been made$/
     */
    public function aVerticalTripletHasBeenMade()
    {
        throw new PendingException();
    }

    /**
     * @Given /^One completes three fields in a diagonal with same symbol$/
     */
    public function oneCompletesThreeFieldsInADiagonalWithSameSymbol()
    {
        throw new PendingException();
    }

    /**
     * @Then /^a diagonal triplet has been made$/
     */
    public function aDiagonalTripletHasBeenMade()
    {
        throw new PendingException();
    }

    /**
     * @Given /^One completes a triplet$/
     */
    public function oneCompletesATriplet()
    {
        throw new PendingException();
    }

    /**
     * @Then /^game should be over$/
     */
    public function gameShouldBeOver()
    {
        throw new PendingException();
    }

    /**
     * @Given /^One completes the last field to be taken$/
     */
    public function oneCompletesTheLastFieldToBeTaken()
    {
        throw new PendingException();
    }

    /**
     * @When /^I check that is my turn$/
     */
    public function iCheckThatIsMyTurn()
    {
        $this->game->setTurnToOPlayer();
        assertTrue($this->player->canPlay());
    }

    /**
     * @Given /^I play$/
     */
    public function iPlay()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I check again and is not my turn$/
     */
    public function iCheckAgainAndIsNotMyTurn()
    {
        throw new PendingException();
    }

    /**
     * @When /^I check that is not my turn$/
     */
    public function iCheckThatIsNotMyTurn()
    {
        throw new PendingException();
    }

    /**
     * @Given /^Second player plays$/
     */
    public function secondPlayerPlays()
    {
        throw new PendingException();
    }

    /**
     * @When /^I fail to take a field that is already taken$/
     */
    public function iFailToTakeAFieldThatIsAlreadyTaken()
    {
        assertFalse($this->oPlayer->mark());
    }

    /**
     * @When /^I successfully take a field that is not taken$/
     */
    public function iTryToTakeAFieldThatIsNotTaken()
    {
        assertTrue($this->oPlayer->mark());
    }
    
}

class Game
{
    protected $turnSwitcher;
    protected $turnToPlayer = 1;
    protected 

    public function __construct($turnSwitcher) {
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
        }
    }
}

class Player
{
    protected $symbol;
    protected $positionSelector;
    protected $fieldTaker;
    
    public function __construct($symbol, $fieldTaker) {
        $this->symbol = $symbol;
        $this->fieldTaker = $fieldTaker;
    }

    public function mark() {

        // returns true upon successful take
        return $this->fieldTaker->take();

        // and false on fail
    }
}

class FieldTaker
{
    public function __construct($positionSelector) {
        $this->positionSelector = $positionSelector;
    }

    public function take() {
        $positionSelected = $this->positionSelector->getPosition();
        // take this position
        

        return true; // successful take
    }
}

class PositionSelector
{
    public function getPosition() {
        // algorithm to determine position
        $selectedPosition = 1;

        return $selectedPosition;
    }
}

class TurnSwitcher
{
    public function flips() {
        // flips turnToPlayer
        if ($this->turnToPlayer == 1) {
            $this->turnToPlayer() = 2;
        } else {
            $this->turnToPlayer() = 1;
        }

        return $playerInTurn;
    }

    public function getTotalMoves() {
        
        return $totalMoves;
    }
}