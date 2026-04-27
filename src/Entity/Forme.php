<?php

namespace App\Entity;

use App\Repository\FormeRepository;
use BcMath\Number;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Exception;

#[ORM\Entity(repositoryClass: FormeRepository::class)]
class Forme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $long = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $larg = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLong(): ?int
    {
        return $this->long;
    }

    public function setLong(int $long): static
    {
        $this->long = $long;

        return $this;
    }

    public function getLarg(): ?int
    {
        return $this->larg;
    }

    public function setLarg(int $larg): static
    {
        $this->larg = $larg;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function __construct(?int $long = null, ?int $larg = null, ?string $type = null)
    {
        $this->long = $long;
        $this->larg = $larg;
        $this->type = $type;
    }

    public function Surface(): int
    {
        if ($this->type === 'caree') {
            if ($this->long != $this->larg) {
                throw new \Exception("Erreur : pour un carré, la longueur doit être égale à la largeur.");
            }
        }
        return (int)$this->long * (int)$this->larg;
    }


    public function Perimetre(): int
    {
        if ($this->type === 'caree') {
            if ($this->long != $this->larg) {
                throw new \Exception("Erreur : pour un carré, la longueur doit être égale à la largeur.");
            }
        }
        return ((int)$this->long + (int)$this->larg) * 2;
    }

}
