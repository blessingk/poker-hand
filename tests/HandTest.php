<?php

use PHPUnit\Framework\TestCase;
use Poker\Hand;

class HandTest extends TestCase
{
    public function testHandCreation()
    {
        $hand = new Hand('AS, 10C, 10H, 3D, 3S');
        $cards = $hand->getCards();

        $this->assertCount(5, $cards);
        $this->assertEquals('A', $cards[0]->rank);
        $this->assertEquals('S', $cards[0]->suit);
    }
}
