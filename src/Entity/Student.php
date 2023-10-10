<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numeStudent = null;

    #[ORM\Column]
    private ?float $mediaStudent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $grupa = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialitate $specialitate = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeStudent(): ?string
    {
        return $this->numeStudent;
    }

    public function setNumeStudent(string $numeStudent): static
    {
        $this->numeStudent = $numeStudent;

        return $this;
    }

    public function getMediaStudent(): ?float
    {
        return $this->mediaStudent;
    }

    public function setMediaStudent(float $mediaStudent): static
    {
        $this->mediaStudent = $mediaStudent;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getGrupa(): ?string
    {
        return $this->grupa;
    }

    public function setGrupa(string $grupa): static
    {
        $this->grupa = $grupa;

        return $this;
    }

    public function getSpecialitate(): ?Specialitate
    {
        return $this->specialitate;
    }

    public function setSpecialitate(?Specialitate $specialitate): static
    {
        $this->specialitate = $specialitate;

        return $this;
    }
}