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

function turnLoop(int $turnNumber, Mage $mage, Enemy $enemy): void
{
    echo "#############################\n";
    echo "########## Tour ".$turnNumber." ###########\n";
    echo "#############################\n";

    lineBreak();

    echo $mage->getName().", que souhaitez vous faire ?\n";
    echo "1 - ⚔️ Attaquer !\n";
    echo "2 - 💫 Lancer un sort !\n";
    echo "3 - 🍷 Boire une potion de soin.\n";
    echo "4 - 🍵 Boire une potion de mana.\n";

    $input = getInput();
    switch ($input) {
        case 1:
            $mage->attack($enemy);
            break;
        case 2:
            $mage->useMagic($enemy, 20, 30);
            break;
        case 3:
            $mage->drinkHealthPotion(50);
            break;
        case 4:
            $mage->drinkManaPotion(50);
            break;
        default:
            die('fatal error : invalid input');
            break;
    }

    lineBreak();

    if ($enemy->isAlive()) {
        $enemy->attack($mage);
    }

    roundSummary($mage, $enemy);

    lineBreak();
}

function roundSummary(Mage $mage, Enemy $enemy): void
{
    echo "\n### Fin du tour ###\n";

    displayStatus($mage);
    displayStatus($enemy);

    lineBreak();
    displayLine();
}

function getInput(): int
{
    while (true) {
        $fin = fopen ("php://stdin","r");
        $line = fgets($fin);
        switch ($line){
            case "1":
                return 1;
                break;
            case "2":
                return 2;
                break;
            case "3":
                return 3;
                break;
            case "4":
                return 4;
                break;
            default:
                break;
        }

    }
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
$troll = new Troll();
$hero = $gandalf;
$enemies = [$troll];
$turnCounter = 0;

echo "########## Hero ###########\n";
displayStatus($hero);
lineBreak(2);


echo "########## Énnemis ##########\n";
foreach ($enemies as $enemy){
    displayLine();
    echo "Ennemi : \n";
    displayStatus($enemy);
    lineBreak();
}

do{
    $turnCounter++;
    turnLoop($turnCounter, $hero, $enemies[0]);
    if (!$enemies[0]->isAlive()){
        array_splice($enemies, 0, 1);
    }
}while($hero->isAlive() && count($enemies)>0);

lineBreak();

echo "⭐⭐⭐⭐⭐⭐⭐⭐ Vous avez gagné !! ⭐⭐⭐⭐⭐⭐⭐⭐";

lineBreak();


