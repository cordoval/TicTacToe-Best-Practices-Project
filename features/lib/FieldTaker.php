<?php

class FieldTaker
{
    public function __construct($positionSelector) {
        $this->positionSelector = $positionSelector;
    }

    public function take() {
        $positionSelected = $this->positionSelector->getPosition();
        // take this position


        return true; // successful take
    }
}


