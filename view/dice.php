<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;

$_SESSION["scoreUsr"] = 0;
$_SESSION["scoreBot"] = 0;
$_SESSION["stopgame"] = 0;

settype($_SESSION["pointsUsr"], "integer");
settype($_SESSION["pointsBot"], "integer");


$die = new \Edvin\Dice\Dice();

// $die->roll();

// $die->rollTwo();

// $throws = $throws + $die->getLastRoll();
// $_SESSION["score"] += $die->getLastRoll();


?><h1><?= $header ?></h1>

<p><?= $message ?></p>


<h2>Välj 1 eller 2 tärningar:</h2><form method="POST">
    <input type="radio" id="one" name="diceChoice" value="en tärning">
    <label for="one">1</label><br>
    <input type="radio" id="two" name="diceChoice" value="två tärningar">
    <label for="two">2</label><br>
    <input type="submit" value="Kör">
</form>
