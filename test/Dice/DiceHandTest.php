<?php

declare(strict_types=1);

namespace Edvin\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class TestDiceHandClass extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateDiceClass()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Edvin\Dice\DiceHand", $dice);
    }

    public function testRollDice()
    {
        $diceHand = new DiceHand();
        $diceHand->roll();
        $res = $diceHand->getLastRoll();
        $exp = "\Psr\Http\Message\ResponseInterface";
        $this->assertIsString($res, $exp);
    }

    public function testRollTwoDice()
    {
        $diceHand = new Dice();
        $diceHand->rollTwo();
        $res = $diceHand->getLastRoll();
        $exp = "\Psr\Http\Message\ResponseInterface";
        $this->assertIsInt($res, $exp);
    }
}
