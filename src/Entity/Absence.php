<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absence", indexes={@ORM\Index(name="test11", columns={"id_seance"}), @ORM\Index(name="test12", columns={"id_eleve"})})
 * @ORM\Entity
 */
class Absence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Eleve
     *
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_eleve", referencedColumnName="id_eleve")
     * })
     */
    private $idEleve;

    /**
     * @var \Seance
     *
     * @ORM\ManyToOne(targetEntity="Seance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_seance", referencedColumnName="id_seance")
     * })
     */
    private $idSeance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdEleve(): ?Eleve
    {
        return $this->idEleve;
    }

    public function setIdEleve(?Eleve $idEleve): self
    {
        $this->idEleve = $idEleve;

        return $this;
    }

    public function getIdSeance(): ?Seance
    {
        return $this->idSeance;
    }

    public function setIdSeance(?Seance $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }


}
