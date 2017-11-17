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
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=10)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=255)
     */
    private $heureFin;

    /**
     *
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
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return HoraireRDV
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return string
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param string $heureFin
     *
     * @return HoraireRDV
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return string
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set disponibilite
     *
     * @param \stdClass $disponibilite
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
     * @return \stdClass
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }
}

