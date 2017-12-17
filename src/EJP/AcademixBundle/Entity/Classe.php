<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use EJP\AcademixBundle\Service\AnneeScolaire;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\ClasseRepository")
 */
class Classe
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudes = new ArrayCollection();
        $this->enseignes = new ArrayCollection();
        $this->eleves = new ArrayCollection();
        $this->enseignants = new ArrayCollection();
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="niveau", type="integer")
     */
    private $niveau;


    /**
     * @var Etude
     * @ORM\OneToMany(targetEntity="Etude", mappedBy="classe", cascade={"all"})
     */

    private $etudes;

    /**
     * @var Enseigne
     * @ORM\OneToMany(targetEntity="Enseigne", mappedBy="classe", cascade={"all"})
     */

    private $enseignes;



    private $eleves;

    private $enseignants;

    private $currentEtude;

    private $currentEnseignes;




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
     * @return ArrayCollection
     */
    public function getEnseignants()
    {
        $enseignants= new ArrayCollection();

        /** @var Enseigne $en */
        foreach ($this->enseignes as $en){
            $enseignants[] = $en->getEnseignant();
        }

        return $enseignants;
    }


    /** @param Enseignant $enseignant */
    public function addEnseignant($enseignant){


        $enseigne = new Enseigne();

        $enseigne->setClasse($this);
        $enseigne->setEnseignant($enseignant);

        $this->addEnseigne($enseigne);

    }

    /** @param Enseignant $enseignant */
    public function removeEnseignant($enseignant){

        /** @var Enseigne $en */

        $enseignes = $this->getCurrentEnseignes();
        foreach ($enseignes as $en){
            if ($en->getEnseignant()===$enseignant){

                $this->removeEnseigne($en);
            }
        }


    }


    /**
     * @return ArrayCollection
     */
    public function getEleves()
    {
        $eleves= new ArrayCollection();

        //XX113 changer par les currentEtudes
        /** @var Etude $et */
        foreach ($this->etudes as $et){
            $eleves[] = $et->getEleve();
    }

        return $eleves;
    }

    /**
     * Add eleve
     *
     *
     */
    public function addEleve(Eleve $eleve)
    {


        $et = $eleve->getCurrentEtude();
        if ($et != null){
        $et->setClasse($this);
        $this->eleves[] = $eleve;
        }

    }

    public function removeEleve(Eleve $eleve){

        $et = $eleve->getCurrentEtude();
        $et->setClasse(null);
    }



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Classe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param int $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function __toString()
    {
        return $this->nom;
    }


    /**
     * Add etude
     *
     * @param \EJP\AcademixBundle\Entity\Etude $etude
     *
     * @return Classe
     */
    public function addEtude(Etude $etude)
    {

        $this->etudes[] = $etude;

        return $this;
    }

    /**
     * Remove etude
     *
     * @param Etude $etude
     */
    public function removeEtude(Etude $etude)
    {

        $this->etudes->removeElement($etude);
    }

    /**
     * Get etudes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudes()
    {

        return $this->etudes;
    }


    /**
     * Add enseigne
     *
     * @param \EJP\AcademixBundle\Entity\Enseigne $enseigne
     *
     * @return Classe
     */
    public function addEnseigne(Enseigne $enseigne)
    {
        $this->enseignes[] = $enseigne;

        return $this;
    }

    /**
     * Remove enseigne
     *
     * @param \EJP\AcademixBundle\Entity\Enseigne $enseigne
     */
    public function removeEnseigne(Enseigne $enseigne)
    {

        $this->enseignes->removeElement($enseigne);

    }

    /**
     * Get enseignes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnseignes()
    {
        return $this->enseignes;
    }


    /**
     * @return ArrayCollection
     */
    public function getCurrentEnseignes()
    {
        $year =  AnneeScolaire::getAnneeScolaire();
        $currentEnseignes = new ArrayCollection();

        /** @var Enseigne $enseigne */
        foreach ($this->getEnseignes() as $enseigne){
            if ($enseigne->getAnneeScolaire()==$year){
                $currentEnseignes->add($enseigne);
            }
        }

        return $currentEnseignes;
    }

    /**
     * @return mixed
     */
    public function getCurrentEtudes()
    {
        $year =  AnneeScolaire::getAnneeScolaire();
        $currentEtudes = new ArrayCollection();

        /** @var Etude $etude */
        foreach ($this->getEtudes() as $etude){
            if ($etude->getAnneeScolaire()==$year){
                $currentEtudes->add($etude);
            }
        }

        return $currentEtudes;
    }

    /**
     * @param Etude $etudes
     */
    public function setEtudes($etudes)
    {
        /** @var Etude $et */
        foreach ($etudes as $et){
            $et->setClasse($this);
        }

        $this->etudes = $etudes;
    }

    /**
     * @param ArrayCollection $enseignes
     */
    public function setEnseignes($enseignes)
    {
        $this->enseignes = $enseignes;
    }






}
