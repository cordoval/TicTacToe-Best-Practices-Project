Feature: tictactoe game
  In_order_to become a tictactoe player
  As_a player myself
  I_need_to_be_able_to know when someone has made a triplet

Scenario: an horizontal triplet
  When Game is playing
   And One completes three fields in a row with same symbol
  Then an horizontal triplet has been made

Scenario: a vertical triplet
  When Game is playing
   And One completes three fields in a column with same symbol
  Then a vertical triplet has been made

Scenario: a diagonal triplet
  When Game is playing
   And One completes three fields in a diagonal with same symbol
  Then a diagonal triplet has been made