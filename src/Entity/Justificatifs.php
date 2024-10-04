<?php

namespace App\Entity;

use App\Repository\JustificatifsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JustificatifsRepository::class)]
class Justificatifs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Facture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contrat = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Missions $mission_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacture(): ?string
    {
        return $this->Facture;
    }

    public function setFacture(string $Facture): static
    {
        $this->Facture = $Facture;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(string $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getMissionId(): ?Missions
    {
        return $this->mission_id;
    }

    public function setMissionId(?Missions $mission_id): static
    {
        $this->mission_id = $mission_id;

        return $this;
    }
}
