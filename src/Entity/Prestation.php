<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu4;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="prestations")
     */
    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
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

    public function getContenu1(): ?string
    {
        return $this->contenu1;
    }

    public function setContenu1(string $contenu1): self
    {
        $this->contenu1 = $contenu1;

        return $this;
    }

    public function getContenu2(): ?string
    {
        return $this->contenu2;
    }

    public function setContenu2(?string $contenu2): self
    {
        $this->contenu2 = $contenu2;

        return $this;
    }

    public function getContenu3(): ?string
    {
        return $this->contenu3;
    }

    public function setContenu3(?string $contenu3): self
    {
        $this->contenu3 = $contenu3;

        return $this;
    }

    public function getContenu4(): ?string
    {
        return $this->contenu4;
    }

    public function setContenu4(?string $contenu4): self
    {
        $this->contenu4 = $contenu4;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }
}
