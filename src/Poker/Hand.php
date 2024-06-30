<?php

namespace Poker;

class Hand
{
    private $cards = [];

    /**
     * @param array $cards
     */
    public function __construct(array $cards)
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

    /**
     * @return string
     */
    public function evaluateHand(): string
    {
        $evaluator = new Handler();
        return $evaluator->evaluate($this->cards);
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

}