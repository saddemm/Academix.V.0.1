<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Travail
 *
 * @ORM\Table(name="travail")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\TravailRepository")
 */
class Travail
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ajoute_le", type="date")
     */
    private $ajouteLe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pour_le", type="date")
     */
    private $pourLe;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Cours")
     * @ORM\JoinColumn(name="cour_id", referencedColumnName="id")
     */
    private $cours;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Travail
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Travail
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ajouteLe
     *
     * @param \DateTime $ajouteLe
     *
     * @return Travail
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
     * Set pourLe
     *
     * @param \DateTime $pourLe
     *
     * @return Travail
     */
    public function setPourLe($pourLe)
    {
        $this->pourLe = $pourLe;

        return $this;
    }

    /**
     * Get pourLe
     *
     * @return \DateTime
     */
    public function getPourLe()
    {
        return $this->pourLe;
    }

    /**
     * Set cours
     *
     * @param \stdClass $cours
     *
     * @return Travail
     */
    public function setCours($cours)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return \stdClass
     */
    public function getCours()
    {
        return $this->cours;
    }
}

