<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseigne
 *
 * @ORM\Table(name="enseigne")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EnseigneRepository")
 */
class Enseigne
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
     * @ORM\Column(name="annee_scolaire", type="string", length=10)
     */
    private $anneeScolaire;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="classe", type="object")
     */
    private $classe;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Evenement")
     *
     */

    private $evenements;


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
     * @param \stdClass $classe
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
     * @param mixed $evenements
     */
    public function setEvenements($evenements)
    {
        $this->evenements = $evenements;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvenements()
    {
        return $this->evenements;
    }
}

