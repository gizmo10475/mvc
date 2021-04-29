<?php

declare(strict_types=1);

namespace Edvin\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

class YatzyController
{
    public function start(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/yatzywelcome.php");
        $_SESSION["dice1status"] = true;
        $_SESSION["dice2status"] = true;
        $_SESSION["dice3status"] = true;
        $_SESSION["dice4status"] = true;
        $_SESSION["dice5status"] = true;
        $_SESSION["yatzythrows"] = 1;
        $_SESSION["totalones"] = 0;
        $_SESSION["totaltwos"] = 0;
        $_SESSION["totalthrees"] = 0;
        $_SESSION["totalfours"] = 0;
        $_SESSION["totalfives"] = 0;
        $_SESSION["totalsixes"] = 0;
        $_SESSION["totalpoints"] = 0;
        $_SESSION["bonus"] = 0;
        $_SESSION["totalSum"] = 0;
        $_SESSION["listan"] = [];
        $_SESSION["counter"] = 0;


        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
    public function startpost(): void
    {
        $body = renderView("layout/yatzy.php");
        sendResponse($body);

        return;
    }
    public function startgame(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $die = new \Edvin\Dice\Dice();
        $dice = new \Edvin\Dice\DiceGraphic();

        $res = [];

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

        // if ($_SESSION["yatzythrows"] < 3) {
        // }
        if ($_SESSION["yatzythrows"] == 3) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 1) {
                    $_SESSION["counter"] += 1;
                }
            }
            $_SESSION["totalones"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] = $_SESSION["totalones"];
        } elseif ($_SESSION["yatzythrows"] > 3 and $_SESSION["yatzythrows"] < 6) {
            $_SESSION["counter"] = 0;
        } elseif ($_SESSION["yatzythrows"] == 6) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 2) {
                    $_SESSION["counter"] += 2;
                }
            }
            $_SESSION["totaltwos"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] += $_SESSION["totaltwos"];
        } elseif ($_SESSION["yatzythrows"] > 6 and $_SESSION["yatzythrows"] < 9) {
            $_SESSION["counter"] = 0;
        } elseif ($_SESSION["yatzythrows"] == 9) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 3) {
                    $_SESSION["counter"] += 3;
                }
            }
            $_SESSION["totalthrees"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] += $_SESSION["totalthrees"];
        } elseif ($_SESSION["yatzythrows"] > 9 and $_SESSION["yatzythrows"] < 12) {
            $_SESSION["counter"] = 0;
        } elseif ($_SESSION["yatzythrows"] == 12) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 4) {
                    $_SESSION["counter"] += 4;
                }
            }
            $_SESSION["totalfours"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] += $_SESSION["totalfours"];
        } elseif ($_SESSION["yatzythrows"] > 12 and $_SESSION["yatzythrows"] < 15) {
            $_SESSION["counter"] = 0;
        } elseif ($_SESSION["yatzythrows"] == 15) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 5) {
                    $_SESSION["counter"] += 5;
                }
            }
            $_SESSION["totalfives"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] += $_SESSION["totalfives"];
        } elseif ($_SESSION["yatzythrows"] > 15 and $_SESSION["yatzythrows"] < 18) {
            $_SESSION["counter"] = 0;
        } elseif ($_SESSION["yatzythrows"] == 18) {
            foreach ($_SESSION["listan"] as $value) {
                if (substr($value, -1) == 6) {
                    $_SESSION["counter"] += 6;
                }
            }
            $_SESSION["totalsixes"] = $_SESSION["counter"];
            $_SESSION["totalpoints"] += $_SESSION["totalsixes"];
            if ((int)$_SESSION["totalpoints"] >= 63) {
                $_SESSION["bonus"] = 50;
            }
            $_SESSION["totalSum"] = ($_SESSION["totalpoints"] + $_SESSION["bonus"]);
        }

        $_SESSION["dice1status"] = true;
        $_SESSION["dice2status"] = true;
        $_SESSION["dice3status"] = true;
        $_SESSION["dice4status"] = true;
        $_SESSION["dice5status"] = true;
        $_SESSION["yatzythrows"] += 1;

        $body = renderView("layout/yatzy.php");
        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function gamepost(): void
    {

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
        redirectTo(url("/yatzy"));
        return;
    }
}
