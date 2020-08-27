<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation", indexes={@ORM\Index(name="IDX_F4DD61D322444C7", columns={"id_eleve"}), @ORM\Index(name="IDX_F4DD61D34E89FE3A", columns={"id_matiere"})})
 * @ORM\Entity
 */
class Affectation
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
     * @ORM\Column(name="jour", type="date", nullable=false)
     */
    private $jour;

    /**
     * @var int
     *
     * @ORM\Column(name="paye", type="integer", nullable=false)
     */
    private $paye;

    /**
     * @var int
     *
     * @ORM\Column(name="reste", type="integer", nullable=false)
     */
    private $reste;

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
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matiere", referencedColumnName="id_matiere")
     * })
     */
    private $idMatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getPaye(): ?int
    {
        return $this->paye;
    }

    public function setPaye(int $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getReste(): ?int
    {
        return $this->reste;
    }

    public function setReste(int $reste): self
    {
        $this->reste = $reste;

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

    public function getIdMatiere(): ?Matiere
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Matiere $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }


}
