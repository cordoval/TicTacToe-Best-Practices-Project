<?php

interface RuleInterface
{
    function isMarkerPlacementAllowed($game, $player, $position);
}
