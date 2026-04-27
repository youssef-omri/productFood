<?php

namespace App\Tests\Entity;
use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
    public function testCategorieAgeInvalide()
    {
        $person = new Personne('Test', 'Test', -5);
        $this->expectException(\Exception::class);
        $person->getCategorie();
    }

    public function testCategorieMineur()
    {
        $person = new Personne('louee', 'Bessaadi', 15);
        $this->assertSame('mineur', $person->getCategorie());
    }

    public function testCategorieMajeur()
    {
        $person = new Personne('Guedri', 'Khalil', 20);
        $this->assertSame('majeur', $person->getCategorie());
    }
}