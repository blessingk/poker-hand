<?php

namespace Poker\Contracts;

interface HandlerInterface
{
    public function evaluate(array $cards);
}