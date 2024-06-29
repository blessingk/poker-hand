<?php

namespace Poker\Poker;
class Handler
{
    public function evaluate($cards) : string
    {
        switch (true) {
            case $this->isRoyalFlush($cards):
                return 'Royal Flush';
            case $this->isStraightFlush($cards):
                return 'Straight Flush';
            case $this->isFourOfAKind($cards):
                return 'Four of a Kind';
            case $this->isFullHouse($cards):
                return 'Full House';
            case $this->isFlush($cards):
                return 'Flush';
            case $this->isStraight($cards):
                return 'Straight';
            case $this->isThreeOfAKind($cards):
                return 'Three of a Kind';
            case $this->isTwoPair($cards):
                return 'Two Pair';
            case $this->isOnePair($cards):
                return 'One Pair';
            default:
                return 'High Card';
        }
    }

    private function isRoyalFlush($cards)
    {
        return $this->isStraightFlush($cards) && $this->containsAce($cards);
    }

    private function isStraightFlush($cards)
    {
        return $this->isFlush($cards) && $this->isStraight($cards);
    }

    private function isFourOfAKind($cards)
    {
        $ranks = array_map(function($card) {
            return $card->rank;
        }, $cards);

        $rankCounts = array_count_values($ranks);
        return max($rankCounts) == 4;
    }

    private function isFullHouse($cards)
    {
        $ranks = array_map(function($card) {
            return $card->rank;
        }, $cards);

        $rankCounts = array_count_values($ranks);
        return count(array_filter($rankCounts, function($count) {
                return $count == 3;
            })) == 1 && count(array_filter($rankCounts, function($count) {
                return $count == 2;
            })) == 1;
    }

    private function isFlush($cards)
    {
        $suits = array_map(function($card) {
            return $card->suit;
        }, $cards);

        return count(array_unique($suits)) == 1;
    }

    private function isStraight($cards)
    {
        $ranks = array_map(function($card) {
            return $this->rankValue($card->rank);
        }, $cards);

        sort($ranks);

        for ($i = 0; $i < count($ranks) - 1; $i++) {
            if ($ranks[$i] + 1 !== $ranks[$i + 1]) {
                return false;
            }
        }

        return true;
    }

    private function isThreeOfAKind($cards)
    {
        $ranks = array_map(function($card) {
            return $card->rank;
        }, $cards);

        $rankCounts = array_count_values($ranks);
        return max($rankCounts) == 3;
    }

    private function isTwoPair($cards)
    {
        $ranks = array_map(function($card) {
            return $card->rank;
        }, $cards);

        $rankCounts = array_count_values($ranks);
        $pairs = array_filter($rankCounts, function($count) {
            return $count == 2;
        });

        return count($pairs) == 2;
    }

    private function isOnePair($cards)
    {
        $ranks = array_map(function($card) {
            return $card->rank;
        }, $cards);

        $rankCounts = array_count_values($ranks);
        $pairs = array_filter($rankCounts, function($count) {
            return $count == 2;
        });

        return count($pairs) == 1;
    }

    private function containsAce($cards)
    {
        foreach ($cards as $card) {
            if ($card->rank == 'A') {
                return true;
            }
        }
        return false;
    }

    private function rankValue($rank)
    {
        $rankValues = ['2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, 'J' => 11, 'Q' => 12, 'K' => 13, 'A' => 14];
        return $rankValues[$rank];
    }
}