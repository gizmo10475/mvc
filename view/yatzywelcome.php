<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;

?><h1><?= $header ?></h1>

<p><?= $message ?></p>


<h2>Tryck för att spela yatzy!</h2><form method="POST">
    <input type="submit" value="Kör">
</form>
