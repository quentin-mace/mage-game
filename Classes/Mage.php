<?php
class Mage extends Character
{
    const HEALTH = "health";
    const MAGIC = "magic";
    private int $mana;
    private int $maxMana;

    public function __construct(
        string $name,
        int $maxHp = 100,
        int $maxMana = 50,
        int $strength = 20
    ) {
        parent::__construct($name, $maxHp, $strength);
        $this->mana = $maxMana;
        $this->maxMana = $maxMana;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(string $mana): void
    {
        $this->mana = $mana;
    }

    public function getMaxMana(): int
    {
        return $this->maxMana;
    }

    public function setMaxMana(int $maxMana): void
    {
        $this->maxMana = $maxMana;
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

    private function healMana(int $value): void
    {
        $this->mana = $this->mana + $value;
        echo $this->name . ' récupère ' . $value . " points de Mana.\n";
        if ($this->maxMana < $this->mana) {
            $this->mana = $this->maxMana;
            echo $this->name . " à recouvré tout son mana.\n";
        }
    }

    private function checkManaAvaliability(int $cost): bool
    {
        if ($cost > $this->mana) {
            echo "Pas assez de mana pour lancer le sort !";
            return false;
        }
        return true;
    }

    public function attack(Mage|Enemy $target): void
    {
        echo $this->getName() . " attaque " . $target->getName() . " !\n";
        $target->sufferDamage($this->strengh);
        echo $target->getName() . " pert " . $this->strengh . " PV.\n";
    }

    public function useMagic(Mage|Enemy $target, int $manaCost, int $damage): void
    {
        if (!$this->checkManaAvaliability($manaCost)) {
            exit();
        }
        echo $this->getName() . " lance un sort sur " . $target->getName() . " !\n";
        $this->mana -= $manaCost;
        $target->sufferDamage($damage);
        echo $target->getName() . " pert " . $damage . " PV.\n";
    }

    private function drinkPotion(int $value, string $type): void
    {
        switch ($type) {
            case self::HEALTH:
                $this->heal($value);
                break;
            case self::MAGIC:
                $this->healMana($value);
                break;
        }
    }

    public function drinkHealthPotion(int $value = 100): void
    {
        echo $this->name . " bois une potion de soin.\n";
        $this->drinkPotion($value, self::HEALTH);
    }

    public function drinkManaPotion(int $value = 50): void
    {
        echo $this->name . " bois une potion de mana.\n";
        $this->drinkPotion($value, self::MAGIC);
    }

}
