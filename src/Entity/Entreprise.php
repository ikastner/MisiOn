<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEntreprise = null;

    #[ORM\OneToOne(mappedBy: 'entreprise_id', cascade: ['persist', 'remove'])]
    private ?Gestionnaire $gestionnaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): static
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getGestionnaire(): ?Gestionnaire
    {
        return $this->gestionnaire;
    }

    public function setGestionnaire(?Gestionnaire $gestionnaire): static
    {
        // unset the owning side of the relation if necessary
        if ($gestionnaire === null && $this->gestionnaire !== null) {
            $this->gestionnaire->setEntrepriseId(null);
        }

        // set the owning side of the relation if necessary
        if ($gestionnaire !== null && $gestionnaire->getEntrepriseId() !== $this) {
            $gestionnaire->setEntrepriseId($this);
        }

        $this->gestionnaire = $gestionnaire;

        return $this;
    }
}
