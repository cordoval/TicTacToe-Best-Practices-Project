<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';
//
   require_once __DIR__.'/../lib/Game.php';
   require_once __DIR__.'/../lib/FieldTaker.php';
   require_once __DIR__.'/../lib/PositionSelector.php';
   require_once __DIR__.'/../lib/Player.php';
   require_once __DIR__.'/../lib/TurnSwitcher.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    protected $game;
    protected $oPlayer;
    protected $xPlayer;
    protected $savedPlayer;

    protected $dispatcher;
    protected $turnSwitcher;
    
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
        $this->dispatcher = new EventDispatcher();
        $this->turnSwitcher = new TurnSwitcher();
        $this->game = new Game($this->dispatcher, $this->turnSwitcher);

    }

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
     * @Given /^I play once successfully$/
     */
    public function iPlayOnceSuccessfully()
    {
        $this->game->anyPlayOnce();
    }

    /**
     * @Given /^current player is noted$/
     */
    public function currentPlayerIsNoted()
    {
        $this->savedPlayer = $this->game->getCurrentPlayer();
    }

    /**
     * @Then /^current player is not the same$/
     */
    public function currentPlayerIsNotTheSame()
    {
        $currentPlayer = $this->game->getCurrentPlayer();
        assertNotEquals($currentPlayer, $this->savedPlayer);
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
        //assertTrue($this->oPlayer->mark());
    }
    
}
