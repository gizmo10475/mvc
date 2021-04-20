<?php

declare(strict_types=1);

namespace Edvin\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Edvin\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

class DiceController
{
    public function start(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();


        $body = renderView("layout/dice.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function gamepost(): void
    {
        if ($_POST["diceChoice"] == "en tärning") {
            redirectTo(url("/dice1"));
        } else if ($_POST["diceChoice"] == "två tärningar") {
            redirectTo(url("/dice2"));
        }

        return;
    }

    public function get1(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();


        $body = renderView("layout/dice1.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function get2(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();


        $body = renderView("layout/dice2.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function getpost(): void
    {
        // $psr17Factory = new Psr17Factory();

        if ($_POST["btn"] == "stop") {
            $_SESSION["stopgame"] = 1;
            $body = renderView("layout/dice1.php");
            sendResponse($body);
        } else if ($_POST["btn"] == "slå tärning") {
            $body = renderView("layout/dice1.php");
            sendResponse($body);
        }
        return;
    }

    public function getpost2(): void
    {
        // $psr17Factory = new Psr17Factory();

        if ($_POST["btn"] == "stop") {
            $_SESSION["stopgame"] = 1;
            $body = renderView("layout/dice2.php");
            sendResponse($body);
        } else if ($_POST["btn"] == "slå tärning") {
            $body = renderView("layout/dice2.php");
            sendResponse($body);
        }
        return;
    }

    public function getstats(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();


        $body = renderView("layout/stats.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function poststats(): void
    {
        // $psr17Factory = new Psr17Factory();

        $_SESSION["pointsUsr"] = 0;
        $_SESSION["pointsBot"] = 0;
        $body = renderView("layout/stats.php");
        sendResponse($body);
        return;
    }

    public function indexDicegraphic(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();


        $body = renderView("layout/indexDicegraphic.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
