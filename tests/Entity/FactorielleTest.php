<?php

namespace App\Tests\Entity;

use App\Entity\Factorielle;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FactorielleTest extends TestCase
{
    public static function factorialProvider(): array
    {
        return [
            '3!' => [3, 6],
            '7!' => [7, 5040],
            '5!' => [5, 120],
            '8!' => [8, 40320],
        ];
    }

    #[DataProvider('factorialProvider')]
    public function testCalculFactorielle(int $input, int $expected): void
    {
        $factorielle = new Factorielle();
        $factorielle->setNbr($input);
        $result = $factorielle->calculFactorielle();
        $this->assertEquals($expected, $result);
    }
}