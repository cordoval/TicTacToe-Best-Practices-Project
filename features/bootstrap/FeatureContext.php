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
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
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
        throw new PendingException();
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
     * @When /^I try to take a field that is already taken$/
     */
    public function iTryToTakeAFieldThatIsAlreadyTaken()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should not be able to take the field$/
     */
    public function iShouldNotBeAbleToTakeTheField()
    {
        throw new PendingException();
    }

    /**
     * @When /^I try to take a field that is not taken$/
     */
    public function iTryToTakeAFieldThatIsNotTaken()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should be able to own that field$/
     */
    public function iShouldBeAbleToOwnThatField()
    {
        throw new PendingException();
    }

}
