<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Forme;

class FormeTest extends TestCase
{
    public function testSurfaceRectangle()
    {
        $forme = new Forme();
        $forme->setType("rectangle");
        $forme->setLong(5);
        $forme->setLarg(3);

        $this->assertEquals(15, $forme->Surface());
    }

    public function testPerimetreRectangle()
    {
        $forme = new Forme();
        $forme->setType("rectangle");
        $forme->setLong(5);
        $forme->setLarg(3);

        $this->assertEquals(16, $forme->Perimetre());
    }

    public function testExceptionSiCarreInvalidePerimetre()
{
    $this->expectException(\Exception::class);

    $forme = new Forme();
    $forme->setType("caree");
    $forme->setLong(5);
    $forme->setLarg(3);

    $forme->Perimetre();
}
}