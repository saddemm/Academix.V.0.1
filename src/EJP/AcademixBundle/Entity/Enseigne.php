<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EJP\AcademixBundle\Service\AnneeScolaire;

/**
 * Enseigne
 *
 * @ORM\Table(name="enseigne")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EnseigneRepository")
 */
class Enseigne
{

    public function __construct()
    {
        $this->anneeScolaire = AnneeScolaire::getAnneeScolaire();
    }
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
     * @ORM\Column(name="annee_scolaire", type="string", length=10)
     */
    private $anneeScolaire;

    /**
     * @var Enseignant
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id", onDelete="SET NULL")
     */

    private $classe;


    /**
     * @var Enseignant
     *
     * @ORM\ManyToOne(targetEntity="Enseignant")
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id", onDelete="SET NULL")
     */


    private $enseignant;


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
     * Set anneeScolaire
     *
     * @param string $anneeScolaire
     *
     * @return Enseigne
     */
    public function setAnneeScolaire($anneeScolaire)
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }

    /**
     * Get anneeScolaire
     *
     * @return string
     */
    public function getAnneeScolaire()
    {
        return $this->anneeScolaire;
    }

    /**
     * Set classe
     *
     * @param Classe $classe
     *
     * @return Enseigne
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \stdClass
     */
    public function getClasse()
    {
        return $this->classe;
    }


    /**
     * @return Enseignant
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * @param Enseignant $enseignant
     */
    public function setEnseignant($enseignant)
    {
        $this->enseignant = $enseignant;
    }
}

