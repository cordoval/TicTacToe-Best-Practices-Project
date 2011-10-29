Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to know when the game is over or not

Scenario: game over when one completes triplet
  When Game is playing
   And One completes a triplet
  Then game should be over

Scenario: game over when there is no more fields to fill (a draft)
  When Ga1me is playing
   And One completes the last field to be taken
  Then game should be over