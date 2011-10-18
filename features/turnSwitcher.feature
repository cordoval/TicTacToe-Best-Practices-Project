Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to take turns taking fields with second player

Scenario: it is my turn
  When I check that is my turn
   And I play
  Then I check again and is not my turn

Scenario: it is second player turn
  When I check that is not my turn
   And Second player plays
  Then I check that is my turn
