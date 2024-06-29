<?php

namespace Poker;

class Hand
{
    private $cards = [];

    /**
     * @param $cards
     */
    public function __construct($cards)
    {
        foreach ($cards as $card) {
            $this->addCard(new Card(substr($card, 0, -1), substr($card, -1)));
        }
    }

    /**
     * @param $card
     * @return void
     */
    public function addCard($card)
    {
        $this->cards[] = $card;
    }

    public function evaluateHand()
    {
        $evaluator = new Handler();
        return $evaluator->evaluate($this->cards);
    }

    public function getCards() {
        return $this->cards;
    }

}