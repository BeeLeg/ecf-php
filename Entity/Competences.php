<?php

namespace App\Entity;

use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetencesRepository::class)
 */
class Competences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=user::class, inversedBy="competences")
     */
    private $comp_user;

    public function __construct()
    {
        $this->comp_user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getCompUser(): Collection
    {
        return $this->comp_user;
    }

    public function addCompUser(user $compUser): self
    {
        if (!$this->comp_user->contains($compUser)) {
            $this->comp_user[] = $compUser;
        }

        return $this;
    }

    public function removeCompUser(user $compUser): self
    {
        $this->comp_user->removeElement($compUser);

        return $this;
    }
}
