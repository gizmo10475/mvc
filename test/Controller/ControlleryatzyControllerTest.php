<?php

declare(strict_types=1);

namespace Edvin\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class TestDiceYatzyClass extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateYatzyClass()
    {
        $yatzy = new yatzyController();
        $this->assertInstanceOf("\Edvin\Controller\yatzyController", $yatzy);
    }

    public function testStartYatzy()
    {
        $controller = new yatzyController();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->start();
        $this->assertInstanceOf($exp, $res);
    }

    public function testStartGameYatzy()
    {
        $controller = new yatzyController();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->startgame();
        $this->assertInstanceOf($exp, $res);
    }

    // public function testStartPostYatzy()
    // {
    //     $controller = new yatzyController();

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->startpost();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // public function testGamePostYatzy()
    // {
    //     $controller = new yatzyController();

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->gamepost();
    //     $this->assertInstanceOf($exp, $res);
    // }
}
