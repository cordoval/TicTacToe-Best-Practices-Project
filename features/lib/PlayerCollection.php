<?php

namespace PHPPeru\TicTacToe\lib;

use PHPPeru\TicTacToe\lib\Player;
/*require_once __DIR__.'/../lib/Player.php';*/

class PlayerCollection implements IteratorAggregate {

    protected $players;

    public function __construct() {
        $this->players = new ArrayIterator(array());
    }

    public function getIterator() {
        return new InfiniteIterator($this->players);
    }

    public function add(Player $player) {
        $this->players[] = $player;
    }

    public function first() {
        return $this->players[0];
    }

    public function next() {
        $next = next($this->players);
        if ($next == false) {
            $next = $this->rewind();
        }

        return $next;
    }

    public function current() {
        return current($this->players);
    }

    public function rewind() {
        return reset($this->players);
    }

    public function key() {
        return key($this->players);
    }
}
