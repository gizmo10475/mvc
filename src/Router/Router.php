<?php

declare(strict_types=1);

namespace Edvin\Router;

use function Edvin\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/dice") {
            // $data = [
            //     "header" => "Rainbow page",
            //     "message" => "Hey, edit this to do it youreself!",
            // ];
            // $body = renderView("layout/dice.php", $data);
            // sendResponse($body);

            $callable = new \Edvin\Dice\Game();
            $callable->playGame();

            return;
        } else if ($method === "POST" && $path === "/dice") {
            if ($_POST["diceChoice"] == "en tärning") {
                redirectTo(url("/dice1"));
            } else if ($_POST["diceChoice"] == "två tärningar") {
                redirectTo(url("/dice2"));
            }
            return;
        } else if ($method === "GET" && $path === "/dice1") {
            $body = renderView("layout/dice1.php");
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/dice1") {
            // var_dump($_POST["btn"]);
            if ($_POST["btn"] == "stop") {
                $_SESSION["stopgame"] = 1;
                $body = renderView("layout/dice1.php");
                sendResponse($body);
            } else if ($_POST["btn"] == "slå tärning") {
                $body = renderView("layout/dice1.php");
                sendResponse($body);
            }
            return;
        } else if ($method === "GET" && $path === "/dice2") {
            $body = renderView("layout/dice2.php");
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/dice2") {
            if ($_POST["btn"] == "stop") {
                $_SESSION["stopgame"] = 1;
                $body = renderView("layout/dice2.php");
                sendResponse($body);
            } else if ($_POST["btn"] == "slå tärning") {
                $body = renderView("layout/dice2.php");
                sendResponse($body);
            }
            return;
        } else if ($method === "GET" && $path === "/index_dicegraphic") {
            $body = renderView("layout/index_dicegraphic.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/stats") {
            $body = renderView("layout/stats.php");
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/stats") {
            $_SESSION["pointsUsr"] = 0;
            $_SESSION["pointsBot"] = 0;
            $body = renderView("layout/stats.php");
            sendResponse($body);
            return;
        }
        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}
