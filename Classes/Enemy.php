<?php

abstract class Enemy extends Character
{
    public function __construct(string $name, int $maxHp, int $strength)
    {
        parent::__construct($name, $maxHp, $strength);
    }

}
