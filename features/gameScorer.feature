Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to know when the game is over or not

Scenario: game over when one completes triplet
  When One completes a triplet game should be over

Scenario: game over when there is no more fields to fill (a draft)
   When One completes the last field to be taken game should be over