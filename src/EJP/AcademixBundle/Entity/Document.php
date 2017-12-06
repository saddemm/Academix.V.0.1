<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\DocumentRepository")
 * @Vich\Uploadable
 */
class Document
{
    function __construct()
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
 * @ORM\Column(name="type", type="string", length=50)
 */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=100)
     */
    private $lien;


    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"}
     * )
     * @Vich\UploadableField(mapping="document_file", fileNameProperty="lien")
     *
     * @var File
     */
    private $myFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="date")
     */
    private $createdAt;



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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
        return $this;
    }

    /**
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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

        if ($thefile instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }


        return $this;
    }


}

