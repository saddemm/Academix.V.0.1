<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emploi
 *
 * @ORM\Table(name="emploi")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EmploiRepository")
 */
class Emploi
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
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ajoute_le", type="date")
     */
    private $ajouteLe;


    /**
     * @var Classe
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
     * Set lien
     *
     * @param string $lien
     *
     * @return Emploi
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set ajouteLe
     *
     * @param \DateTime $ajouteLe
     *
     * @return Emploi
     */
    public function setAjouteLe($ajouteLe)
    {
        $this->ajouteLe = $ajouteLe;

        return $this;
    }

    /**
     * Get ajouteLe
     *
     * @return \DateTime
     */
    public function getAjouteLe()
    {
        return $this->ajouteLe;
    }

    /**
     * @param Classe $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

}

