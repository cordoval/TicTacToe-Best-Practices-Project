hacking exercise PHP Peru

Initial Spec
------------

1. a player can take a field if not already taken
2. players take turns taking fields until the game is over
3. a game is over when all fields are taken
4. a game is over when all fields in a column are taken by a player
5. a game is over when all fields in a row are taken by a player
6. a game is over when all fields in a diagonal are taken by a player

source: http://gojko.net/2009/08/02/tdd-as-if-you-meant-it-revisited/

Current Effort
--------------
we are trying to lay out the problem in the best way so it will be
expandable later on. The first approach now is to identify first the
process backbone of the game, then apply events to expand it and
perhaps other patterns such as workflow pattern.

So far we have split into several files already the existent code
which is best for organization. And we have already used the help
initial TDD provided. We will comply with the feature context
scenarios however the development now has gone beyond this point
so we are not limited by the scope of TDD.

Instructions
------------

```sh
git clone http://github.com/phpperu/TicTacToe-Best-Practices-Project.git tictactoe
cd tictactoe
wget http://getcomposer.org/composer.phar
php composer.phar install
./develop
```

TODO
----

* use events for turnSwitcher
* use validatorBoard for AI insertion
* board class has non-fixed dimensions
* validatePosition
    fetch field from global sack and if it returns null it means it's owned by someone else already
* SPL reuse for adding players
* SPL reuse for polling global and player sacks

Contribute
----------

IRC channel: #phpperu on irc.freenode.net

Organization
------------

PHPPeru is now a github organization
