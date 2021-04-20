<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

namespace Edvin\Dice;

use Exception;

$header = $header ?? null;
$message = $message ?? null;

$die = new \Edvin\Dice\Dice();
$dice = new \Edvin\Dice\DiceGraphic();



?> <h1>YATZY</h1> <?php
$rolls = 5;
$res = [];
$class = [];

if (isset($_POST["tärning1"])) {
    $_SESSION["dice1status"] = false;
}
if (isset($_POST["tärning2"])) {
    $_SESSION["dice2status"] = false;
}
if (isset($_POST["tärning3"])) {
    $_SESSION["dice3status"] = false;
}
if (isset($_POST["tärning4"])) {
    $_SESSION["dice4status"] = false;
}
if (isset($_POST["tärning5"])) {
    $_SESSION["dice5status"] = false;
}


if ($_SESSION["dice1status"]) {
    $die = $dice->roll();
    $res[] = $die;
    $_SESSION["dice1value"] = $dice->graphic();
}
if ($_SESSION["dice2status"]) {
    $die = $dice->roll();
    $res[] = $die;
    $_SESSION["dice2value"] = $dice->graphic();
}
if ($_SESSION["dice3status"]) {
    $die = $dice->roll();
    $res[] = $die;
    $_SESSION["dice3value"] = $dice->graphic();
}
if ($_SESSION["dice4status"]) {
    $die = $dice->roll();
    $res[] = $die;
    $_SESSION["dice4value"] = $dice->graphic();
}
if ($_SESSION["dice5status"]) {
    $die = $dice->roll();
    $res[] = $die;
    $_SESSION["dice5value"] = $dice->graphic();
}




$_SESSION["listan"] = [];

array_push($_SESSION["listan"], $_SESSION["dice1value"], $_SESSION["dice2value"], $_SESSION["dice3value"], $_SESSION["dice4value"], $_SESSION["dice5value"]);

$counter = 0;

if ($_SESSION["yatzythrows"] < 3) {
    echo ("SAMLA ETTOR");
} elseif ($_SESSION["yatzythrows"] == 3) {
    echo ("Poäng ettor: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 1) {
            $counter += 1;
        }
    }
    $_SESSION["totalones"] = $counter;
    $_SESSION["totalpoints"] = $_SESSION["totalones"];
    echo ($counter);
    echo (". Nu ska du samla tvåor!");
} elseif ($_SESSION["yatzythrows"] > 3 and $_SESSION["yatzythrows"] < 6) {
    echo ("SAMLA TVÅOR");
} elseif ($_SESSION["yatzythrows"] == 6) {
    echo ("Poäng tvåor: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 2) {
            $counter += 2;
        }
    }
    $_SESSION["totaltwos"] = $counter;
    $_SESSION["totalpoints"] += $_SESSION["totaltwos"];
    echo ($counter);
    echo (". Nu ska du samla treor!");
} elseif ($_SESSION["yatzythrows"] > 6 and $_SESSION["yatzythrows"] < 9) {
    echo ("SAMLA TREOR");
} elseif ($_SESSION["yatzythrows"] == 9) {
    echo ("Poäng treor: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 3) {
            $counter += 3;
        }
    }
    $_SESSION["totalthrees"] = $counter;
    $_SESSION["totalpoints"] += $_SESSION["totalthrees"];
    echo ($counter);
    echo (". Nu ska du samla fyror!");
} elseif ($_SESSION["yatzythrows"] > 9 and $_SESSION["yatzythrows"] < 12) {
    echo ("SAMLA FYROR");
} elseif ($_SESSION["yatzythrows"] == 12) {
    echo ("Poäng fyror: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 4) {
            $counter += 4;
        }
    }
    $_SESSION["totalfours"] = $counter;
    $_SESSION["totalpoints"] += $_SESSION["totalfours"];
    echo ($counter);
    echo (". Nu ska du samla femmor!");
} elseif ($_SESSION["yatzythrows"] > 12 and $_SESSION["yatzythrows"] < 15) {
    echo ("SAMLA FEMMOR");
} elseif ($_SESSION["yatzythrows"] == 15) {
    echo ("Poäng femmor: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 5) {
            $counter += 5;
        }
    }
    $_SESSION["totalfives"] = $counter;
    $_SESSION["totalpoints"] += $_SESSION["totalfives"];
    echo ($counter);
    echo (". Nu ska du samla sexor!");
} elseif ($_SESSION["yatzythrows"] > 15 and $_SESSION["yatzythrows"] < 18) {
    echo ("SAMLA SEXOR");
} elseif ($_SESSION["yatzythrows"] == 18) {
    echo ("Poäng sexor: ");
    foreach ($_SESSION["listan"] as $value) {
        if (substr($value, -1) == 6) {
            $counter += 6;
        }
    }
    $_SESSION["totalsixes"] = $counter;
    $_SESSION["totalpoints"] += $_SESSION["totalsixes"];
    echo ($counter);
    echo (". Spelet Färdigt!");
    if ($_SESSION["totalpoints"] >= 63) {
        $_SESSION["bonus"] = 50;
    }
    $_SESSION["totalSum"] = ($_SESSION["totalpoints"] + $_SESSION["bonus"]);
}

?>

<p class="dice-utf8">
    <?php foreach ($_SESSION["listan"] as $value) : ?>
        <button onclick="<?php ?>" class="<?= $value ?>"> </button>
    <?php endforeach; ?>
</p>
<?php
$_SESSION["dice1status"] = true;
$_SESSION["dice2status"] = true;
$_SESSION["dice3status"] = true;
$_SESSION["dice4status"] = true;
$_SESSION["dice5status"] = true;
$_SESSION["yatzythrows"] += 1;

?>
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
