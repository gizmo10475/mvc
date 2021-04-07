<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;


$dice = new \Edvin\Dice\DiceGraphic();
$rolls = 2;
$res = [];
$class = [];

if ($_SESSION["stopgame"] == 0) {
    for ($i = 0; $i < $rolls; $i++) {
        $die = $dice->roll();
        $res[] = $die;
        $_SESSION["scoreUsr"] += $die;
        $class[] = $dice->graphic();
    }
}

?>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Kastar <?= $rolls ?> Tärning(ar)</h1>

<p class="dice-utf8">
    <?php foreach ($class as $value) : ?>
        <i class="<?= $value ?>"></i>
    <?php endforeach; ?>
</p>

<?php
if ($_SESSION["scoreUsr"] < 21 && $_SESSION["stopgame"] == 0) {
    ?><h2>
        <form method="POST">
            <input type="submit" name="btn" value="slå tärning">
            <input type="submit" name="btn" value="stop">
        </form>
        <?= $_SESSION["scoreUsr"]   ?>
    </h2>
    <?php
} else if ($_SESSION["scoreUsr"] == 21) {
    ?><h2>
        DU VINNER! DU FICK 21!
</h2>
    <a href="stats">Statistik</a>
    <?= $_SESSION["pointsUsr"] += 1 ?>
    <?php
} else if ($_SESSION["scoreUsr"] > 21) {
    ?><h2>
        ÖVER 21, DU FÖRLORAR
        <h2><?= $_SESSION["scoreUsr"] ?></h2>
        <?= $_SESSION["stopgame"] = 1?>
    </h2>
    <a href="stats">Statistik</a><br>
    <a href="dice">Spela igen</a>

    <?php
}


if ($_SESSION["stopgame"] == 1) {
    ?> <h2>Dina poäng: <?= $_SESSION["scoreUsr"] ?></h2> <?php

while ($_SESSION["scoreBot"] < 21) {
        $bot = $dice->rollTwo();
        $_SESSION["scoreBot"] += $bot;
}
?> <h2>Datorns poäng: <?= $_SESSION["scoreBot"]?></h2> 
    <?php

    if ($_SESSION["scoreBot"] == 21) {
        ?>
        <h2>Datorn vann!</h2>
        <a href="stats">Statistik</a><br>
        <?php
        $_SESSION["pointsBot"] += 1;
    } else if ($_SESSION["scoreBot"] > 21 && $_SESSION["scoreUsr"] > 21) {
        ?>
        <h2>Ingen vann.</h2>
        <?php
    } else {
        ?>
        <h2>Du vann!</h2>
        <a href="stats">Statistik</a><br>
        <?php
        $_SESSION["pointsUsr"] += 1;
    }
}