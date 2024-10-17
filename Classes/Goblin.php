<?php

class Goblin extends Enemy
{
    public function __construct(
        string $name = "Goblin",
        int $maxHp = 20,
        int $strength = 50)
    {
        parent::__construct($name, $maxHp, $strength);
    }
}
