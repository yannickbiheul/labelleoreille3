<?php

namespace App\Entity;

use App\Repository\GeneralRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeneralRepository::class)
 */
class General
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
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo3;

    /**
     * @ORM\Column(type="text")
     */
    private $phraseTitre;

    /**
     * @ORM\Column(type="text")
     */
    private $citation;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienFacebook;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienInstagram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogo2(): ?string
    {
        return $this->logo2;
    }

    public function setLogo2(string $logo2): self
    {
        $this->logo2 = $logo2;

        return $this;
    }

    public function getLogo3(): ?string
    {
        return $this->logo3;
    }

    public function setLogo3(string $logo3): self
    {
        $this->logo3 = $logo3;

        return $this;
    }

    public function getPhraseTitre(): ?string
    {
        return $this->phraseTitre;
    }

    public function setPhraseTitre(string $phraseTitre): self
    {
        $this->phraseTitre = $phraseTitre;

        return $this;
    }

    public function getCitation(): ?string
    {
        return $this->citation;
    }

    public function setCitation(string $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getLienFacebook(): ?string
    {
        return $this->lienFacebook;
    }

    public function setLienFacebook(string $lienFacebook): self
    {
        $this->lienFacebook = $lienFacebook;

        return $this;
    }

    public function getLienInstagram(): ?string
    {
        return $this->lienInstagram;
    }

    public function setLienInstagram(string $lienInstagram): self
    {
        $this->lienInstagram = $lienInstagram;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
