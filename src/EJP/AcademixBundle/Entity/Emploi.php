<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EJP\AcademixBundle\Service\AnneeScolaire;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Emploi
 *
 * @ORM\Table(name="emploi")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EmploiRepository")
 * @Vich\Uploadable
 */
class Emploi
{

    public function __construct()
    {

        $this->createdAt = new \DateTime();
        $this->anneeScolaire=AnneeScolaire::getAnneeScolaire();
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
     * @ORM\Column(name="annee_scolaire", type="string", length=255)
     */
    private $anneeScolaire;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;


    /**
     * @var Classe
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe_id", referencedColumnName="id")
     */

    private $classe;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"}
     * )
     * @Vich\UploadableField(mapping="emploi_file", fileNameProperty="lien")
     *
     * @var File
     */
    private $myFile;

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
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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

    /**
     * @return string
     */
    public function getAnneeScolaire()
    {
        return $this->anneeScolaire;
    }

    /**
     * @param string $anneeScolaire
     */
    public function setAnneeScolaire($anneeScolaire)
    {
        $this->anneeScolaire = $anneeScolaire;
        return $this;
    }


    /**
     * @return File
     */
    public function getMyFile()
    {
        return $this->myFile;
    }

    /**
     * @param File $myFile
     */
    public function setMyFile(File $thefile = null)
    {
        $this->myFile = $thefile;
        return $this;
    }



}

