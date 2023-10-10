<?php

namespace App\Entity;

use App\Repository\StudentiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentiRepository::class)]
class Studenti
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'studenti')]
    #[ORM\JoinColumn(nullable: false)]
    private ?specialitate $specialitate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialitate(): ?specialitate
    {
        return $this->specialitate;
    }

    public function setSpecialitate(?specialitate $specialitate): static
    {
        $this->specialitate = $specialitate;

        return $this;
    }
}
