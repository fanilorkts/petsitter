<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\ManyToOne (targetEntity: Annonces::class)]
    #[ORM\JoinColumn(name: "id_annonce", referencedColumnName: "id")]
    private ?int $id_annonce = null;

    #[ORM\ManyToOne (targetEntity: Utilisateurs::class)]
    #[ORM\JoinColumn(name: "id_auteur", referencedColumnName: "id")]
    private ?int $id_auteur = null;

    #[ORM\ManyToOne (targetEntity: Utilisateurs::class)]
    #[ORM\JoinColumn(name: "id_cible", referencedColumnName: "id")]
    private ?int $id_cible = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getIdAnnonce(): ?int
    {
        return $this->id_annonce;
    }

    public function setIdAnnonce(int $id_annonce): static
    {
        $this->id_annonce = $id_annonce;

        return $this;
    }

    public function getIdAuteur(): ?int
    {
        return $this->id_auteur;
    }

    public function setIdAuteur(?int $id_auteur): static
    {
        $this->id_auteur = $id_auteur;

        return $this;
    }

    public function getIdCible(): ?int
    {
        return $this->id_cible;
    }

    public function setIdCible(?int $id_cible): static
    {
        $this->id_cible = $id_cible;

        return $this;
    }
}
