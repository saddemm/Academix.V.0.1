<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EvenementRepository")
 * @Vich\Uploadable
 */
class Evenement
{

    public function __construct()
    {

        $this->datePublication = new \DateTime();
        $this->etat = 1;

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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_evenement", type="date")
     */
    private $dateEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=10)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=255)
     */
    private $heureFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="date")
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */

    private $etat;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Enseignant")
     *
     */

    private $enseignants;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/jpg"}
     * )
     * @Vich\UploadableField(mapping="evenement_file", fileNameProperty="imageName")
     *
     * @var File
     */
    private $myFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;



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
     * Set titre
     *
     * @param string $titre
     *
     * @return Evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
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
     * Set dateEvenement
     *
     * @param \DateTime $dateEvenement
     *
     * @return Evenement
     */
    public function setDateEvenement($dateEvenement)
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    /**
     * Get dateEvenement
     *
     * @return \DateTime
     */
    public function getDateEvenement()
    {
        return $this->dateEvenement;
    }

    /**
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return Evenement
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
     * @return Evenement
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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Evenement
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Evenement
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return mixed
     */
    public function getEnseignants()
    {
        return $this->enseignants;
    }

    /**
     * @param mixed $enseignants
     */
    public function setEnseignants($enseignants)
    {
        $this->enseignants = $enseignants;

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
    public function setMyFile(File $myFile=null)
    {
        $this->myFile = $myFile;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }
}

