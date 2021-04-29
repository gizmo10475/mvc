<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;

?><h1><?= $header ?></h1>

<h1>Välkommen till Yatzy!</h1>

<a href="yatzy">Tryck här för att börja spela</a>
