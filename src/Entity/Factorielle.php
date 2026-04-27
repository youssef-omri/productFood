<?php

namespace App\Entity;

use App\Repository\FactorielleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactorielleRepository::class)]
class Factorielle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbr = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbr(): ?int
    {
        return $this->nbr;
    }

    public function setNbr(int $nbr): static
    {
        $this->nbr = $nbr;

        return $this;
    }

    public function calculFactorielle(): int
{
if ($this->nbr < 0) {
throw new \InvalidArgumentException("La factorielle n'est
pas définie pour les négatifs.");
}
$f = 1;
for ($i = 2; $i <= $this->nbr; $i++) {
$f *= $i;
}
return $f;
}
}
