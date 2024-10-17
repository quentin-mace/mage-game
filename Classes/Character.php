<?php

abstract class Character
{

    protected string $name;
    private int $hp;
    protected int $maxHp;
    protected int $strength;

    public function __construct(
        string $name,
        int $maxHp,
        int $strength
    ) {
        $this->name = $name;
        $this->hp = $maxHp;
        $this->maxHp = $maxHp;
        $this->strength = $strength;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Enemy
    {
        $this->name = $name;
        return $this;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): Enemy
    {
        $this->hp = $hp;
        return $this;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): Enemy
    {
        $this->maxHp = $maxHp;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): Enemy
    {
        $this->strength = $strength;
        return $this;
    }

    public function sufferDamage(int $damage): void
    {
        $this->hp = $this->hp - $damage;
    }

    private function heal(int $value): void
    {
        $this->hp = $this->hp + $value;
        echo $this->name . ' se soigne de ' . $value . " PV.\n";
        if ($this->maxHp < $this->hp) {
            $this->hp = $this->maxHp;
            echo $this->name . " à recouvré tout ses PV.\n";
        }
    }

    public function attack(Mage $target): void
    {
        echo $this->getName() . " attaque " . $target->getName() . " !\n";
        $target->sufferDamage($this->strength);
        echo $target->getName() . " pert " . $this->strength . " PV.\n";
    }

}
