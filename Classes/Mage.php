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

    private function healMana(int $value): void
    {
        $this->mana = $this->mana + $value;
        echo $this->name . ' récupère ' . $value . " points de Mana.\n";
        if ($this->maxMana < $this->mana) {
            $this->mana = $this->maxMana;
            echo "--> ".$this->name . " à recouvré tout son mana. 🔮\n";
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

    public function useMagic(Character $target, int $manaCost, int $damage): void
    {
        if (!$this->checkManaAvaliability($manaCost)) {
            exit();
        }
        echo $this->generateSpellAttackMessage();
        $this->mana -= $manaCost;
        $target->sufferDamage($damage);
    }

    private function generateSpellAttackMessage(): string
    {
        $messages = [
            "💫 {$this->getName()} lève son baton, et 3 projectiles magiques scintillants volent.\n",
            "🔥 {$this->getName()} envoie une puissante boule de feu !\n",
            "🌬️ {$this->getName()} fait appel à la furie des vents...\n",
        ];

        return $messages[array_rand($messages)];
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
        echo "🧉 ".$this->name . " bois une potion de soin. 💉\n";
        $this->drinkPotion($value, self::HEALTH);
    }

    public function drinkManaPotion(int $value = 50): void
    {
        echo "🧉 ".$this->name . " bois une potion de mana. 🌟\n";
        $this->drinkPotion($value, self::MAGIC);
    }

}
