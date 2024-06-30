<?php

use PHPUnit\Framework\TestCase;

use Poker\Hand;
use Poker\Handler;

class HandlerTest extends TestCase
{

    public function testRoyalFlush()
    {
        $hand = new Hand('AS, KS, QS, JS, 10S');
        $this->assertEquals('Royal Flush', $hand->evaluateHand());
    }

    public function testStraightFlush()
    {
        $hand = new Hand('9H, 8H, 7H, 6H, 5H');
        $this->assertEquals('Straight Flush', $hand->evaluateHand());
    }

    public function testFourOfAKind()
    {
        $hand = new Hand('9H, 9D, 9C, 9S, 2H');
        $this->assertEquals('Four of a Kind', $hand->evaluateHand());
    }

    public function testFullHouse()
    {
        $hand = new Hand('10H, 10D, 10C, 3S, 3H');
        $this->assertEquals('Full House', $hand->evaluateHand());
    }

    public function testFlush()
    {
        $hand = new Hand('2H, 4H, 6H, 8H, 10H');
        $this->assertEquals('Flush', $hand->evaluateHand());
    }

    public function testStraight()
    {
        $hand = new Hand('9H, 8D, 7C, 6S, 5H');
        $this->assertEquals('Straight', $hand->evaluateHand());
    }

    public function testThreeOfAKind()
    {
        $hand = new Hand('10H, 10D, 10C, 2S, 3H');
        $this->assertEquals('Three of a Kind', $hand->evaluateHand());
    }

    public function testTwoPair()
    {
        $hand = new Hand('10H, 10D, 3C, 3S, 2H');
        $this->assertEquals('Two Pair', $hand->evaluateHand());
    }

    public function testOnePair()
    {
        $hand = new Hand('10H, 10D, 4C, 2S, 3H');
        $this->assertEquals('One Pair', $hand->evaluateHand());
    }

    public function testHighCard()
    {
        $hand = new Hand('2H, 5D, 8C, JS, 10H');
        $this->assertEquals('High Card', $hand->evaluateHand());
    }
}
