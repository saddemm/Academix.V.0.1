<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HoraireRDV
 *
 * @ORM\Table(name="horaire_r_d_v")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\HoraireRDVRepository")
 */
class HoraireRDV
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_debut", type="integer")
     */
    private $heureDebut;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_fin", type="integer")
     */
    private $heureFin;

    /**
     * @var Disponibilite
     * @ORM\ManyToOne(targetEntity="Disponibilite")
     * @ORM\JoinColumn(name="disponibilite_id", referencedColumnName="id")
     */

    private $disponibilite;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * @param int $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @return int
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @param int $heureFin
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;
    }

    /**
     * Set disponibilite
     *
     * @param Disponibilite $disponibilite
     *
     * @return HoraireRDV
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return Disponibilite
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }
}

