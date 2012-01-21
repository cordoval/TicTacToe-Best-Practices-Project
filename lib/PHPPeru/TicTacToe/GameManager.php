<?php

namespace PHPPeru\TicTacToe;

/**
 * Manages the interactions within a game of tick tac toe
 */
class GameManager
{
    /**
     * Creates a new game between the players specified
     *
     * @param Traversable|array $players that will participate in the game
     * @param Traversable|array $rules that apply to this game
     */
    public function newGame($players, $rules)
    {
        $game = new Game();
        foreach($players as $player)
        {
            $game->addPlayer($player);
        }
        foreach($rules as $rule)
        {
            $game->addRule($rule);
        }
        return $game;
    }

    /**
     * Has the player place a marker in the specified game at the specified position
     *
     * @param Game $game
     * @param Player $player
     * @param $x
     * @param $y
     */
    public function placeMarker(Game $game, Player $player, $x, $y)
    {
        if($game->hasMarkerAt($x,$y))
        {
            throw new Exception("Cannot place marker at the specified coordinates ($x,$y) as there is already a marker there.");
        }

        if(!$game->isPlayersTurn($player))
        {
            throw new Exception("It is not {$player->getName()}'s turn, so they cannot place a marker.");
        }

        // Make sure that no rules prevent this placement
        foreach($game->getPlacementRules() as $rule)
        {
            if(!$rule->isMarkerPlacementAllowed($game,$player,$x,$y))
            {
                throw new Exception("The rules of the game prevent you from placing your marker in this position.");
            }
        }

        // Store the marker placement in the game state, and change to the next turn
        $game->placeMarker($x, $y, $player);
        $game->nextTurn();
    }

    /**
     * Checks the game for the conditions that indicate the game is finished
     *
     * @param Game $game
     */
    protected function isGameFinished(Game $game)
    {
        // Check all the winning conditions on the game to see if any players have won the game
        foreach($game->getWinConditions() as $condition)
        {
            if($condition->isSatisfiedBy($game))
            {
                $winners = $condition->getWinningPlayers($game);
                $game->addWinners($winners);
            }
        }

        // Check the losing conditions on the game to see if any players have lost the game
        foreach($game->getLossConditions() as $condition)
        {
            if($condition->isSatisfiedBy($game))
            {
                $losers = $condition->getLosingPlayers($game);
                $game->addLosers($losers);
            }
        }

        // Check the ending conditions on the game to see if the game has been ended without a winner or loser
        foreach($game->getEndConditions() as $condition)
        {
            if($condition->isSatisfiedBy($game))
            {
                $game->setFinished(true);
            }
        }

        // Return an indicator on whether the game is finished or not
        return $game->isFinished();
    }
}
