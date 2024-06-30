<?php

namespace Poker;

class Card
{
    public $rank;
    public $suit;

    /**
     * @param $rank
     * @param $suit
     */
    public function __construct($rank, $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->rank . $this->suit;
    }
}