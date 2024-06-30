<?php

namespace Poker\Contracts;

interface HandInterface

{
    public function addCard($card);

    public function getCards();

    public function evaluateHand();
}