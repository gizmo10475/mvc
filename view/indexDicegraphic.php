<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

namespace Edvin\Dice;

$header = $header ?? null;
$message = $message ?? null;

$_SESSION["score"] = 0;



/**
 * Throw some graphic dices.
 */

$dice = new DiceGraphic();
$res = [];
for ($i = 0; $i < 6; $i++) {
    $res[] = $dice->roll();
}

?><h1>Rolling six graphic dices</h1>

<p><?= implode(", ", $res) ?></p>
<p>Sum is: <?= array_sum($res) ?>.</p>
<p>Average is: <?= round(array_sum($res) / 6, 1) ?>.</p>