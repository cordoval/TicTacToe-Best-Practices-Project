Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to take a field if not already taken

#Scenario: take a field already taken
#   Then I fail to take a field that is already taken .

Scenario: take a field not taken
   Then I successfully take a field that is not taken

