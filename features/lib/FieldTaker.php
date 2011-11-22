<?php

namespace PHPPeru\TicTacToe\lib;

class FieldTaker
{
    public function __construct($positionSelector) {
        $this->positionSelector = $positionSelector;
    }

    public function take($position = null) {

        if (is_null($position)) {
            // play
            $positionSelected = $this->positionSelector->getPosition();
        } else {
            // override
            $positionSelected = $position;
        }

        // take this position
        $this->transferField($position);

        return true; // successful take
    }

    public function transferField() {

    }
}


