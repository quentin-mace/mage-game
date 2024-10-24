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

    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): Character
    {
        $this->hp = $hp;
        return $this;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): Character
    {
        $this->maxHp = $maxHp;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): Character
    {
        $this->strength = $strength;
        return $this;
    }

    public function sufferDamage(int $damage): void
    {
        echo $this->generateHitMessage();
        echo "--> ".$this->getName() . " pert " . $this->strength . " PV. 🩸\n";
        $this->hp = $this->hp - $damage;
        if ($this->hp <= 0) {
            $this->hp = 0;
            echo $this->name." est mort. ☠️\n";
        }
    }

    protected function heal(int $value): void
    {
        $this->hp = $this->hp + $value;
        echo $this->name . ' se soigne de ' . $value . " PV.\n";
        if ($this->maxHp < $this->hp) {
            $this->hp = $this->maxHp;
            echo "--> ".$this->name . " à recouvré tout ses PV. ❤️‍\n";
        }
    }

    public function attack(Character $target): void
    {
        echo $this->generateAttackMessage();
        $target->sufferDamage($this->strength);
    }

    private function generateAttackMessage(): string
    {
        $messages = [
            "🗡️  {$this->getName()} bondit et attaque sans pitié...\n",
            "💥 {$this->getName()} envoie un puissant coup !\n",
            "⚔️  {$this->getName()} attaque avec une rage inexpliquée...\n",
        ];

        return $messages[array_rand($messages)];
    }

    private function generateHitMessage(): string
    {
        $messages = [
            "🫸  {$this->getName()} est repoussé par l'assaut.\n",
            "🤸  {$this->getName()} trébuche et tombe au sol !\n",
            "🤼‍♂️  {$this->getName()} essaie en vain de bloquer l'attaque...\n",
        ];

        return $messages[array_rand($messages)];
    }

}
