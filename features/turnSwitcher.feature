Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to take turns taking fields with second player

Scenario: check that current player changes after a successful play move
  Given I play once successfully
    And current player is noted
   When I play once successfully
   Then current player is not the same

#Scenario: playing continuously
#  When I play continuously should work too.