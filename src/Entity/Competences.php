<?php

namespace App\Entity;

use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencesRepository::class)]
class Competences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $technologie = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'competences')]
    private ?Freelance $freelance_id = null;

    /**
     * @var Collection<int, Missions>
     */
    #[ORM\ManyToMany(targetEntity: Missions::class, inversedBy: 'competences')]
    private Collection $mission_id;

    public function __construct()
    {
        $this->mission_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(string $technologie): static
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFreelanceId(): ?Freelance
    {
        return $this->freelance_id;
    }

    public function setFreelanceId(?Freelance $freelance_id): static
    {
        $this->freelance_id = $freelance_id;

        return $this;
    }

    /**
     * @return Collection<int, Missions>
     */
    public function getMissionId(): Collection
    {
        return $this->mission_id;
    }

    public function addMissionId(Missions $missionId): static
    {
        if (!$this->mission_id->contains($missionId)) {
            $this->mission_id->add($missionId);
        }

        return $this;
    }

    public function removeMissionId(Missions $missionId): static
    {
        $this->mission_id->removeElement($missionId);

        return $this;
    }
}
