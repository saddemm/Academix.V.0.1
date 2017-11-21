<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Enseignant
 *
 * @ORM\Table(name="enseignant")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EnseignantRepository")
 */
class Enseignant extends Utilisateur
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_recrutement", type="date")
     */
    private $dateRecrutement;


    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;



    /**
     * @var Matiere
     *
     * @Assert\NotBlank()
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
        return parent::getId();
    }


    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
    /**
     * Set dateRecrutement
     *
     * @param \DateTime $dateRecrutement
     *
     * @return Enseignant
     */
    public function setDateRecrutement($dateRecrutement)
    {
        $this->dateRecrutement = $dateRecrutement;

        return $this;
    }

    /**
     * Get dateRecrutement
     *
     * @return \DateTime
     */
    public function getDateRecrutement()
    {
        return $this->dateRecrutement;
    }

    /**
     * @param Matiere $matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
        return $this;
    }

    /**
     * @return Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}

