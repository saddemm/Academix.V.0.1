<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sanction
 *
 * @ORM\Table(name="sanction")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\SanctionRepository")
 */
class Sanction
{

    public function __construct()
    {

        $this->createdAt = new \DateTime();

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
     * @ORM\Column(name="cause", type="string", length=255)
     */
    private $cause;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;


    /**
     * @var Eleve
     *
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumn(name="eleve_id", referencedColumnName="id")
     */

    private $eleve;

    /**
     * @var Enseignant
     *
     * @ORM\ManyToOne(targetEntity="Enseignant")
     * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
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
     * @param string $cause
     */
    public function setCause($cause)
    {
        $this->cause = $cause;
        return $this;
    }



    /**
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Sanction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * @param Eleve $eleve
     */
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;
        return $this;
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
        return $this;
    }

}

