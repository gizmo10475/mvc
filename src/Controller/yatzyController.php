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

        $body = renderView("layout/yatzy.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function gamepost(): void
    {
        $body = renderView("layout/yatzy.php");
        sendResponse($body);

        return;
    }
}
