<?php

use PHPUnit\Framework\TestCase;
use Poker\Card;

class CardTest extends TestCase
{
    public function testCardCreation()
    {
        $card = new Card('A', 'S');
        $this->assertEquals('A', $card->rank);
        $this->assertEquals('S', $card->suit);
    }
}
