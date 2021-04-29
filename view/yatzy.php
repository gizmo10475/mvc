<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

namespace Edvin\Dice;

use Exception;

$header = $header ?? null;
$message = $message ?? null;


?> <h1>YATZY</h1> <?php
if ($_SESSION["yatzythrows"] <= 3) {
    echo ("SAMLA ETTOR");
} elseif ($_SESSION["yatzythrows"] > 3 and $_SESSION["yatzythrows"] <= 6) {
    echo ("SAMLA TVÅOR");
} elseif ($_SESSION["yatzythrows"] > 6 and $_SESSION["yatzythrows"] <= 9) {
    echo ("SAMLA TREOR");
} elseif ($_SESSION["yatzythrows"] > 9 and $_SESSION["yatzythrows"] <= 12) {
    echo ("SAMLA FYROR");
} elseif ($_SESSION["yatzythrows"] > 12 and $_SESSION["yatzythrows"] <= 15) {
    echo ("SAMLA FEMMOR");
} elseif ($_SESSION["yatzythrows"] > 15 and $_SESSION["yatzythrows"] <= 18) {
    echo ("SAMLA SEXOR");
}
?>

<p class="dice-utf8">
    <?php foreach ($_SESSION["listan"] as $value) : ?>
        <button onclick="<?php ?>" class="<?= $value ?>"> </button>
    <?php endforeach; ?>
</p>
<form method="POST">
    <p>behåll tärningar</p>
    <input type="checkbox" id="tärning1" value="tärning1" name="tärning1">
    <input type="checkbox" id="tärning2" value="tärning2" name="tärning2">
    <input type="checkbox" id="tärning3" value="tärning3" name="tärning3">
    <input type="checkbox" id="tärning4" value="tärning4" name="tärning4">
    <input type="checkbox" id="tärning5" value="tärning5" name="tärning5">

    <input type="submit" value="Slå igen" name="submit">
</form>

<table>
    <tr>
        <th>Yatzy</th>
        <th>Poäng</th>
    </tr>
    <tr>
        <td>Ettor</td>
        <td><?php echo ($_SESSION["totalones"]) ?></td>
    </tr>
    <tr>
        <td>Tvåor</td>
        <td><?php echo ($_SESSION["totaltwos"]) ?></td>
    </tr>
    <tr>
        <td>Treor</td>
        <td><?php echo ($_SESSION["totalthrees"]) ?></td>
    </tr>
    <tr>
        <td>Fyror</td>
        <td><?php echo ($_SESSION["totalfours"]) ?></td>
    </tr>
    <tr>
        <td>Femmor</td>
        <td><?php echo ($_SESSION["totalfives"]) ?></td>
    </tr>
    <tr>
        <td>Sexor</td>
        <td><?php echo ($_SESSION["totalsixes"]) ?></td>
    </tr>
    <tr>
        <td><b>Summa</b></td>
        <td><?php echo ($_SESSION["totalpoints"]) ?></td>
    </tr>
    <tr>
        <td>Bonus</td>
        <td><?php echo ($_SESSION["bonus"]) ?></td>
    </tr>
    <tr>
        <td><b>Totalt</b></td>
        <td><?php echo ($_SESSION["totalSum"]) ?></td>
    </tr>

</table>
