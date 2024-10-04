<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\ManyToOne]
    private ?Entreprise $entreprise_id = null;

    #[ORM\ManyToOne(inversedBy: 'personnels')]
    private ?Gestionnaire $gestionnaire_id = null;

    /**
     * @var Collection<int, Missions>
     */
    #[ORM\OneToMany(targetEntity: Missions::class, mappedBy: 'personnel_id')]
    private Collection $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getEntrepriseId(): ?Entreprise
    {
        return $this->entreprise_id;
    }

    public function setEntrepriseId(?Entreprise $entreprise_id): static
    {
        $this->entreprise_id = $entreprise_id;

        return $this;
    }

    public function getGestionnaireId(): ?Gestionnaire
    {
        return $this->gestionnaire_id;
    }

    public function setGestionnaireId(?Gestionnaire $gestionnaire_id): static
    {
        $this->gestionnaire_id = $gestionnaire_id;

        return $this;
    }

    /**
     * @return Collection<int, Missions>
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Missions $mission): static
    {
        if (!$this->missions->contains($mission)) {
            $this->missions->add($mission);
            $mission->setPersonnelId($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): static
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getPersonnelId() === $this) {
                $mission->setPersonnelId(null);
            }
        }

        return $this;
    }
}
