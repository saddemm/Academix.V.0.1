<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="jour", type="string", length=20)
     */
    private $jour;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=10)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=10)
     */
    private $heureFin;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Etude")
     * @ORM\JoinColumn(name="etude_id", referencedColumnName="id")
     */

    private $etude;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     */

    private $matiere;


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
     * Set jour
     *
     * @param string $jour
     *
     * @return Cours
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return Cours
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
     * @return Cours
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
     * Set etude
     *
     * @param \stdClass $etude
     *
     * @return Cours
     */
    public function setEtude($etude)
    {
        $this->etude = $etude;

        return $this;
    }

    /**
     * Get etude
     *
     * @return \stdClass
     */
    public function getEtude()
    {
        return $this->etude;
    }



    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }




    public function getMatiere()
    {
        return $this->matiere;
    }
}

