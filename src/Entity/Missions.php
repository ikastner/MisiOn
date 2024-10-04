<?php

namespace App\Entity;

use App\Repository\MissionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionsRepository::class)]
class Missions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $estimationTemps = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $TJM = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $taille = null;

    #[ORM\ManyToOne(inversedBy: 'missions')]
    private ?Freelance $freelance_id = null;

    #[ORM\ManyToOne(inversedBy: 'missions')]
    private ?Personnel $personnel_id = null;

    /**
     * @var Collection<int, Competences>
     */
    #[ORM\ManyToMany(targetEntity: Competences::class, mappedBy: 'mission_id')]
    private Collection $competences;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getEstimationTemps(): ?\DateTimeInterface
    {
        return $this->estimationTemps;
    }

    public function setEstimationTemps(\DateTimeInterface $estimationTemps): static
    {
        $this->estimationTemps = $estimationTemps;

        return $this;
    }

    public function getTJM(): ?string
    {
        return $this->TJM;
    }

    public function setTJM(string $TJM): static
    {
        $this->TJM = $TJM;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): static
    {
        $this->taille = $taille;

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

    public function getPersonnelId(): ?Personnel
    {
        return $this->personnel_id;
    }

    public function setPersonnelId(?Personnel $personnel_id): static
    {
        $this->personnel_id = $personnel_id;

        return $this;
    }

    /**
     * @return Collection<int, Competences>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): static
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
            $competence->addMissionId($this);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): static
    {
        if ($this->competences->removeElement($competence)) {
            $competence->removeMissionId($this);
        }

        return $this;
    }
}
