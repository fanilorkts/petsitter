<?php

namespace App\Entity;

use App\Repository\CandidaturesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidaturesRepository::class)]
class Candidatures
{

    public const STATUT_EN_ATTENTE = 'En attente';
    public const STATUT_ACCEPTEE = 'Acceptée';
    public const STATUT_REFUSEE = 'Refusée';
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_candidature = null;

    #[ORM\ManyToOne (targetEntity: Annonces::class)]
    #[ORM\JoinColumn(name: "id_annonce", referencedColumnName: "id")]
    private ?int $id_annonce = null;

    #[ORM\ManyToOne (targetEntity: Utilisateurs::class)]
    #[ORM\JoinColumn(name: "id_gardien", referencedColumnName: "id")]
    private ?int $id_gardien = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

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

    public function getDateCandidature(): ?\DateTime
    {
        return $this->date_candidature;
    }

    public function setDateCandidature(\DateTime $date_candidature): static
    {
        $this->date_candidature = $date_candidature;

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

    public function getIdGardien(): ?int
    {
        return $this->id_gardien;
    }

    public function setIdGardien(int $id_gardien): static
    {
        $this->id_gardien = $id_gardien;

        return $this;
    }
}
