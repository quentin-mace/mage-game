<?php
require "Classes/Mage.php";
require "Classes/Enemy.php";
require "Classes/Goblin.php";
require "Classes/Troll.php";


function displayMageStatus(string $status, Mage $mage): void
{
    echo "Nom du " . $status . " : " . $mage->getName() . "\n";
    echo "Points de vie : " . $mage->getHp() . "\n";
    echo "Points de magie : " . $mage->getMana() . "\n";
    echo "Force : " . $mage->getStrengh() . "\n";
}

function displayEnemyStatus(string $status, Enemy $mage): void
{
    echo "Nom du " . $status . " : " . $mage->getName() . "\n";
    echo "Points de vie : " . $mage->getHp() . "\n";
    echo "Force : " . $mage->getStrengh() . "\n";
}

$gandalf = new Mage("Gandalf");
$goblin1 = new Goblin();
$goblin2 = new Goblin();
$troll = new Troll();

displayMageStatus("mage", $gandalf);
echo "\n";
echo "Ennemi 1 : \n";
displayEnemyStatus("enemy", $goblin1);
echo "\n";
$goblin1->attack($gandalf);
echo "\n";
echo "Ennemi 2 :\n";
displayEnemyStatus("ennemy", $troll);
echo "\n";
$troll->attack($gandalf);
echo "\n";
echo "\n";
$gandalf->drinkHealthPotion();
echo "\n";
$gandalf->attack($goblin1);
$gandalf->useMagic($troll, 20, 50);
echo "\n";
$gandalf->drinkManaPotion();
echo "\n";
echo "\n";
displayMageStatus("mage", $gandalf);
echo "\n";
