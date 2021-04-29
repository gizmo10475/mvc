<?php

declare(strict_types=1);

namespace Edvin\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class DiceGraphicTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateDiceGraphicClass()
    {
        $sides = 6;
        $dice = new DiceGraphic($sides);
        $this->assertInstanceOf("\Edvin\Dice\DiceGraphic", $dice);
    }
}
