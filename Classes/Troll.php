<?php

class Troll extends Enemy
{
    public function __construct(
        string $name = "Troll",
        int $maxHp = 50,
        int $strength = 20)
    {
        parent::__construct($name, $maxHp, $strength);
    }
}
