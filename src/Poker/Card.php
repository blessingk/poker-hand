<?php

namespace Poker;

class Card
{
    public $rank;
    public $suit;

    public function __construct($rank, $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }

    public function __toString()
    {
        return $this->rank . $this->suit;
    }
}