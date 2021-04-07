<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;



?>

<h1> Dina Vinster: <?= $_SESSION["pointsUsr"] ?></h1>
<h1> Datorns Vinster: <?= $_SESSION["pointsBot"] ?></h1>

<form method="POST">
    <input type="submit" name="återställ" value="återställ poäng">
</form>