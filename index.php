<?php
require 'Heroes/Vaderus.php';
require 'Heroes/WildBeast.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sapir's Hero</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>

</body>
</html>
<?php
$rounds = 1;
$vaderus = new Vaderus();
$wildBeast = new WildBeast();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <section class="panel">
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p>Hero Name: <b><?= $vaderus->getName(); ?></b></p>
                        <p>Starting Health: <b><?= $vaderus->getHealth(); ?></b> </p>
                        <p>Starting Strength: <b><?= $vaderus->getStrength(); ?></b> </p>
                        <p>Starting Defence: <b><?= $vaderus->getDefence(); ?></b></p>
                        <p>Starting Speed: <b><?= $vaderus->getSpeed(); ?></b></p>
                        <p>Luck: <b><?= $vaderus->getLuck(); ?></b> </p>
                    </div>
                    <img class="heroes" width="100" height="100" src="styles/images/hero.png">
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="panel">
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p>Hero Name: <b><?= $wildBeast->getName() ?></b></p>
                        <p>Starting Health: <b><?= $wildBeast->getHealth(); ?></b> </p>
                        <p>Starting Strength: <b><?= $wildBeast->getStrength(); ?></b> </p>
                        <p>Starting Defence: <b><?= $wildBeast->getDefence(); ?></b></p>
                        <p>Starting Speed: <b><?= $wildBeast->getSpeed(); ?></b></p>
                        <p>Luck: <b><?= $wildBeast->getLuck(); ?></b></p>
                    </div>
                    <img class="heroes" width="100" height="100" src="styles/images/beast.png">
                </div>
            </section>
        </div>
        <div style="text-align: center;">
            <form>
                <input class="btn btn-default btn-lg
" type="submit" name="start" value="Start Battle">
            </form>
        </div>
    </div>
    <!--Displaying the heroes current damage -->
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div style="text-align: center;">
                        Vaderus Attacking Damage: <b><?= $vaderus->calculateDamage($wildBeast); ?></b>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-body">
                    <div style="text-align: center;">
                        Wild Beast Attacking Damage: <b><?= $wildBeast->calculateDamage($vaderus); ?></b>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <hr class="line">
    <?php
    // Start the battle if the button "Start Battle" is clicked..
    if (isset($_GET["start"])) {
        echo "<div class='row'>";
            while ($rounds <= 20 && $vaderus->isAlive() && $wildBeast->isAlive()) {
                $rapidStrikeLuckGenerator = rand(1, 100);
                $doubleAttack = $vaderus->calculateDamage($wildBeast) * 2;

                $magicShieldLuckGenerator = rand(1, 100);
                $getWildBeastHalfDamage = $wildBeast->calculateDamage($vaderus) / 2;
                var_dump($magicShieldLuckGenerator);
                var_dump($getWildBeastHalfDamage);

                //Checking players speed..
                if ($vaderus->getSpeed() > $wildBeast->getSpeed()) {
                    //Vaderus attack first..
                    echo "<div class='col-lg-4'>";
                        echo "<section class='panel'>";
                            echo "<div class='panel-body'>";
                                //Printing Current Game Status
                                echo "<p>Round <b>$rounds</b> Status: </p>";
                                echo "<p>Vaderus Is The First Attacker In This Battle</p>";
                                echo "<hr class='line'>";
                                if ($rapidStrikeLuckGenerator >= 1 && $rapidStrikeLuckGenerator <= 10) {
                                    echo "<p>Vaderus hits twice with <b>" . $vaderus->calculateDamage($wildBeast) * 2 . "</b> Damage</p>";
                                    $wildBeast->reduceHealth($doubleAttack);
                                } else {
                                    $vaderus->attack($wildBeast);
                                    echo "<p>Vaderus Attacked !</p>";
                                }

                                if ($magicShieldLuckGenerator >= 1 && $getWildBeastHalfDamage <= 20) {
                                    $vaderus->reduceHealth($getWildBeastHalfDamage);
                                } else {
                                    $wildBeast->attack($vaderus);
                                }
                                echo "<p>Wild Beast Attacked !</p>";
                                echo "<hr class='line'>";
                                echo "<p>==> Vaderus Current Health => <b>" . $vaderus->getHealth() . "</b></p>";
                                echo "<p>==> Wild Beast Current Health => <b>" . $wildBeast->getHealth() . "</b></p>";
                            echo "</div>";
                        echo "</<section>";
                    echo "</div>";
                }
                elseif ($vaderus->getSpeed() < $wildBeast->getSpeed()) {
                    //Wild Beast attack first..
                    echo "<div class='col-lg-4'>";
                        echo "<section class='panel'>";
                            echo "<div class='panel-body'>";
                                //Printing Current Game Status
                                echo "<p>Round <b>$rounds</b> Status: <p/>";
                                echo "<p>Wild Beast Is The First Attacker In This Battle</p>";
                                echo "<hr class='line'>";
                                if ($rapidStrikeLuckGenerator >= 1 && $rapidStrikeLuckGenerator <= 10) {
                                    echo "Valderus uses Magic Shield !";
                                    echo "<p>Vaderus hits twice with <b>" . $vaderus->calculateDamage($wildBeast) * 2 . "</b> Damage</p>";
                                    $wildBeast->reduceHealth($doubleAttack);
                                } else {
                                    $vaderus->attack($wildBeast);
                                    echo "<p>Vaderus Attacked !</p>";
                                }

                                if ($magicShieldLuckGenerator >= 1 && $magicShieldLuckGenerator <= 20) {
                                    echo "Valderus uses Magic Shield !";
                                    $vaderus->reduceHealth($getWildBeastHalfDamage);
                                } else {
                                    $wildBeast->attack($vaderus);
                                }
                                echo "<p>Wild Beast Attacked !</p>";
                                echo "<hr class='line'>";
                                echo "<p>==> Wild Beast Current Health => <b>" . $wildBeast->getHealth() . "</b></p>";
                                echo "<p>==> Vaderus Current Health => <b>" . $vaderus->getHealth() . "</b></p>";
                            echo "</div>";
                         echo "</<section>";
                    echo "</div>";
                } else {
                    if ($vaderus->getLuck() > $wildBeast->getLuck()) {
                        //Vaderus attack first..
                        $vaderus->attack($wildBeast);
                        $wildBeast->attack($vaderus);
                        echo "<div class='col-lg-4'>";
                        echo "<section class='panel'>";
                        echo "<div class='panel-body'>";
                        //Printing Current Game Status
                        echo "<p>Round <b>$rounds</b> Status: </p>";
                        echo "<p>Vaderus Is The First Attacker In This Battle</p>";
                        echo "<hr class='line'>";
                        echo "<p>Vaderus Attacked !</p>";
                        echo "<p>Wild Beast Attacked !</p>";
                        echo "<hr class='line'>";
                        echo "<p>==> Vaderus Current Health => <b>" . $vaderus->getHealth() . "</b></p>";
                        echo "<p>==> Wild Beast Current Health => <b>" . $wildBeast->getHealth() . "</b></p>";
                        echo "</div>";
                        echo "</<section>";
                        echo "</div>";
                    }
                    elseif ($vaderus->getLuck() < $wildBeast->getLuck() ) {
                        //Wild Beast attack first..
                        $wildBeast->attack($vaderus);
                        $vaderus->attack($wildBeast);
                        echo "<div class='col-lg-4'>";
                        echo "<section class='panel'>";
                        echo "<div class='panel-body'>";
                        //Printing Current Game Status
                        echo "<p>Round <b>$rounds</b> Status: <p/>";
                        echo "<p>Wild Beast Is The First Attacker In This Battle</p>";
                        echo "<hr class='line'>";
                        echo "<p>Wild Beast Attacked !</p>";
                        echo "<p>Vaderus Attacked !</p>";
                        echo "<hr class='line'>";
                        echo "<p>==> Wild Beast Current Health => <b>" . $wildBeast->getHealth() . "</b></p>";
                        echo "<p>==> Vaderus Current Health => <b>" . $vaderus->getHealth() . "</b></p>";
                        echo "</div>";
                        echo "</<section>";
                        echo "</div>";
                    }
                }
                $rounds++;
            }
            // Check who's the winner in the battle
            $winner = $vaderus->isAlive() ? "Winner is " . $vaderus->getName() : "Winner is " . $wildBeast->getName();
        echo "</div>";
        echo "<div class='row'>";
            echo "<div class='col-lg-12'>";
                echo "<section class='panel'>";
                    echo "<div class='panel-body'>";
                        echo "<div style='text-align: center;'>";
                            echo "<h1><i>$winner</i></h1>";
                        echo "</div>";
                    echo "</div>";
                echo "</section>";
            echo "</div>";
        echo "</div>";
    }
echo "</div>";