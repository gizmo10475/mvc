<?php

declare(strict_types=1);

namespace Edvin\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the co ntroller Index.
 */
class TestDiceControllerClass extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $dice = new DiceController();
        $this->assertInstanceOf("\Edvin\Controller\DiceController", $dice);
    }

    // public function testget1()
    // {
    //     $controller = new DiceController();
    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->indexDicegraphic();
    //     $this->assertInstanceOf($exp, $res);
    // }
    // public function testget2function()
    // {
    //     $controller = new DiceController();
    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->get2();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // public function testgetstats()
    // {
    //     $controller = new DiceController();
    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->getstats();
    //     $this->assertInstanceOf($exp, $res);
    // }
}
