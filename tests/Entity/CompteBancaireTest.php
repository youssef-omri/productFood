<?php

namespace App\Tests\Entity;

use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;

class CompteBancaireTest extends TestCase
{

    public function testRetraitValide()
    {
        $compte = new CompteBancaire("Guedri", 1000);

        $solde = $compte->retirer(200);

        $this->assertSame(800.0, $solde); 
    }

    public function testRetraitImpossible()
    {
        $compte = new CompteBancaire("Khalil", 300);

        $this->expectException("Exception");

        $compte->retirer(500);
    }

}