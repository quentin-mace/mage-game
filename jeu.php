<?php
require "Classes/Character.php";
require "Classes/Enemy.php";
require "Classes/Mage.php";
require "Classes/Goblin.php";
require "Classes/Troll.php";

function displayLine(): void
{
    echo "----------------------------\n";
}

function lineBreak(int $number = 1)
{
    $count = 0;
    while($count < $number){
        echo "\n";
        $count++;
    }
}

function displayTurn(int $number): void
{
    echo "#############################\n";
    echo "########## Tour ".$number." ###########\n";
    echo "#############################\n";
}

function displayStatus(Character $character): void
{
    displayLine();
    echo "### Nom : " . $character->getName() . " ###\n";
    echo "Points de vie : " . $character->getHp() . "\n";
    if ($character instanceof Mage) {
        echo "Points de magie : " . $character->getMana() . "\n";
    }
    echo "Force : " . $character->getStrength() . "\n";
    displayLine();
}

$gandalf = new Mage("Gandalf");
$goblin1 = new Goblin();
$goblin2 = new Goblin();
$troll = new Troll();

echo "########## Heros ##########\n";
displayStatus($gandalf);
lineBreak(2);
echo "########## Énnemis ##########\n";
displayLine();
echo "Ennemi 1 : \n";
displayStatus($goblin1);
echo "Ennemi 2 : \n";
displayStatus($troll);
lineBreak(2);

displayTurn(1);
$goblin1->attack($gandalf);
lineBreak();
$troll->attack($gandalf);
lineBreak(2);
$gandalf->drinkHealthPotion();
lineBreak();
$gandalf->attack($goblin1);
lineBreak();
$gandalf->useMagic($troll, 20, 50);
lineBreak();
$gandalf->drinkManaPotion();
lineBreak(2);
echo "##### Combattants restant #####\n";
displayStatus($gandalf);
lineBreak();
