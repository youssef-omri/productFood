<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $proprietaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function __construct(string $proprietaire, float $solde)
    {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

    public function retirer(float $montant): float
    {
        if ($montant > $this->solde) {
            throw new \Exception("Solde insuffisant");
        }
        
        $this->solde = $this->solde - $montant;
        
        return $this->solde;
    }



    public static function retirerMontantValideProvider(): array
    {
        return [
            [1000.0, 300.0, 700.0],
            [500.0, 100.0, 400.0],
            [1500.0, 500.0, 1000.0],
            [1500.0, 200.0, 1300.0],
        ];
    }

    #[DataProvider('retirerMontantValideProvider')]
    public function testRetirerMontantValide(float $solde, float $montant, float $reste)
    {
        $compte = new CompteBancaire('ali', $solde);
        $resultat = $compte->retirer($montant);
        $this->assertEquals($reste, $resultat);
    }

    public function testRetirerToutLeSolde()
    {
        $compte = new CompteBancaire('ali', 500.0);
        $solde = $compte->retirer(500.0);
        $this->assertEquals(0.0, $solde);
    }

    public function testRetirerMontantSuperieurAuSolde()
    {
        $compte = new CompteBancaire('ali', 100.0);
        $this->expectException(\Exception::class);
        $compte->retirer(200.0);
    }

    public function testConstructeur()
    {
        $compte = new CompteBancaire('Bara', 1500.0);
        $this->assertEquals('Bara', $compte->getProprietaire());
        $this->assertEquals(1500.0, $compte->getSolde());
    }
}
