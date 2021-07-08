<?php

namespace App\Entity;

use App\Repository\ProfessionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionsRepository::class)
 */
class Professions
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
    private $titre;

    /**
     * @ORM\ManyToMany(targetEntity=user::class, inversedBy="professions")
     */
    private $prof_user;

    public function __construct()
    {
        $this->prof_user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getProfUser(): Collection
    {
        return $this->prof_user;
    }

    public function addProfUser(user $profUser): self
    {
        if (!$this->prof_user->contains($profUser)) {
            $this->prof_user[] = $profUser;
        }

        return $this;
    }

    public function removeProfUser(user $profUser): self
    {
        $this->prof_user->removeElement($profUser);

        return $this;
    }
}
