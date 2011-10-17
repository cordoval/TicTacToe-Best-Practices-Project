Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to take a field if not already taken

Scenario: take a field already taken
  Given that a Game starts
  When I check that is my turn
   And I try to take a field that is already taken
  Then I should not be able to take the field

Scenario: take a field not taken
  Given that a Game starts
  When I check that is my turn
   And I try to take a field that is not taken
  Then I should be able to own that field

