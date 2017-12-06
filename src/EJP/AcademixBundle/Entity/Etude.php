<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EJP\AcademixBundle\Service\AnneeScolaire;

/**
 * Etude
 *
 * @ORM\Table(name="etude")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EtudeRepository")
 */
class Etude
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
     * @var integer
     *
     * @ORM\Column(name="annee_scolaire", type="integer")
     */
    private $anneeScolaire;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", nullable=true)
     */
    private $moyenne;

    /**
     * @var int
     *
     * @ORM\Column(name="succes", type="integer", nullable=true)
     */
    private $succes;

    /**
     * @var int
     *
     * @ORM\Column(name="niveau", type="integer", nullable=true)
     */
    private $niveau;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumn(name="eleve_id", referencedColumnName="id")
     */
    private $eleve;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     */
    private $classe;


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
     * @param int $anneeScolaire
     */
    public function setAnneeScolaire($anneeScolaire)
    {
        $this->anneeScolaire = $anneeScolaire;
    }

    /**
     * @return int
     */
    public function getAnneeScolaire()
    {
        return $this->anneeScolaire;
    }


    /**
     * Set moyenne
     *
     * @param float $moyenne
     *
     * @return Etude
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne
     *
     * @return float
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set succes
     *
     * @param integer $succes
     *
     * @return Etude
     */
    public function setSucces($succes)
    {
        $this->succes = $succes;

        return $this;
    }

    /**
     * Get succes
     *
     * @return int
     */
    public function getSucces()
    {
        return $this->succes;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     *
     * @return Etude
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return int
     */
    public function getNiveau()
    {
        return $this->niveau;
    }



    public function setEleve($eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }


    public function getEleve()
    {
        return $this->eleve;
    }


    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }


    public function getClasse()
    {
        return $this->classe;
    }

    public function __toString()
    {
        return "Test Affichage Etude";
    }

}

