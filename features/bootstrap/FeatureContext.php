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
require_once 'bootstrap.php';

use PHPPeru\TicTacToe\Game;
use PHPPeru\TicTacToe\FieldTaker;
use PHPPeru\TicTacToe\PositionSelector;
use PHPPeru\TicTacToe\Player;
use PHPPeru\TicTacToe\TurnSwitcher;

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    protected $game;
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
        //$fieldTaker = new FieldTaker(new PositionSelector());
        // Initialize your context here
        //$this->oPlayer = new Player('o', $fieldTaker);
        //$this->xPlayer = new Player('x', $fieldTaker);
        $this->dispatcher = new EventDispatcher();
        $this->turnSwitcher = new TurnSwitcher();
        $this->game = new Game($this->dispatcher, $this->turnSwitcher);

    }

    /**
     * @When /^Game is playing$/
     */
    public function gameIsPlaying()
    {
        assertEquals($this->game->run(), true);
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
     * @When /^One completes a triplet game should be over$/
     */
    public function oneCompletesATriplet()
    {
        // set a triplet
        $this->game->getCurrentPlayer()->getBag()->setPosition(11);
        $this->game->getCurrentPlayer()->getBag()->setPosition(12);
        $this->game->getCurrentPlayer()->getBag()->setPosition(13);
        assertEquals($this->game->isGameOver(), Game::PLAYER_WINS);
    }

    /**
     * @When /^One completes the last field to be taken game should be over$/
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
     * @When /^I successfully take a field that is not taken$/
     */
    public function iSuccessfullyTakeAFieldThatIsNotTaken()
    {
        $this->game->getCurrentPlayer()->getGameBag()->setPosition(1);
        assertEquals($this->game->getCurrentPlayer()->takeFieldAt(1), true);
    }

    /**
     * @When /^I fail to take a field that is already taken$/
     */
    public function iFailToTakeAFieldThatIsAlreadyTaken()
    {
        assertFalse($this->game->getCurrentPlayer()->takeFieldAt(1), false);
    }

    /**
     * @When /^I play continuously should work too$/
     */
    public function iPlayContinuouslyShouldWorkToo()
    {
        assertEquals($this->game->run(), true);
        /*// assign players
        $ps = new PositionSelector();
        $ft = new FieldTaker($ps);
        $player1 = new Player('x', $ft);
        $player2 = new Player('o', $ft);

        $pc = new PlayerCollection();
        $pc->add($player1);
        $pc->add($player2);

        // iterator not working
        var_export($pc->next()->getSymbol());
        //var_export($pc->current());
        var_export($pc->next()->getSymbol());
        var_export($pc->next()->getSymbol());
        var_export($pc->next()->getSymbol());
        */
    }

}
