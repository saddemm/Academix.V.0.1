<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use EJP\AcademixBundle\Service\AnneeScolaire;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Enseignant
 *
 * @ORM\Table(name="enseignant")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EnseignantRepository")
 */
class Enseignant extends Utilisateur
{
    public function __construct()
    {
        parent::__construct();
        $this->enseignes = new ArrayCollection();
        $this->bassas = new ArrayCollection();
        $this->disponibilites = new ArrayCollection();
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_recrutement", type="date")
     */
    private $dateRecrutement;

    /**
     * @var Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id", onDelete="SET NULL")
     */

    private $matiere;

    /**
     * @var Enseigne
     * One enseignant has Many enseigne.
     * @ORM\OneToMany(targetEntity="Enseigne", mappedBy="enseignant",cascade={"persist"})
     */

    private $enseignes;

    /**
     * @var Disponibilite
     * One enseignant has Many disponibilities.
     * @ORM\OneToMany(targetEntity="Disponibilite", mappedBy="enseignant",cascade={"persist"})
     */

    private $disponibilites;




    private $currentEnseignes;


    private $bassas;





    public function addBassa(Classe $classe){

        $enseigne = new Enseigne();
        $enseigne->setClasse($classe);
        $enseigne->setEnseignant($this);
        $this->enseignes->add($enseigne);
    }

    public function removeBassa(Classe $classe){
        /** @var Enseigne $en */
        foreach ($this->getCurrentEnseignes() as $en){
            if ($en->getClasse() == $classe){
                $this->removeEnseigne($en);
            }
        }
    }



    /**
     * @return ArrayCollection
     */

    public function getBassas()
    {

        $classes = new ArrayCollection();
        /** @var Enseigne $en */
        foreach ($this->getCurrentEnseignes() as $en){
            $classes->add($en->getClasse());
        }

        return $classes;
    }





    public function getCurrentEnseignes()
    {

        $year =  AnneeScolaire::getAnneeScolaire();

        $currentEnseignes = new ArrayCollection();

        foreach ($this->getEnseignes() as $enseigne){
            if ($enseigne->getAnneeScolaire()==$year){
                $currentEnseignes->add($enseigne);
            }
        }

        return $currentEnseignes;
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

    /**
     * Add enseigne
     *
     * @param \EJP\AcademixBundle\Entity\Enseigne $enseigne
     *
     * @return Enseignant
     */
    public function addEnseigne(\EJP\AcademixBundle\Entity\Enseigne $enseigne)
    {
        $this->enseignes[] = $enseigne;

        return $this;
    }

    /**
     * Remove enseigne
     *
     * @param \EJP\AcademixBundle\Entity\Enseigne $enseigne
     */
    public function removeEnseigne(\EJP\AcademixBundle\Entity\Enseigne $enseigne)
    {
        $this->enseignes->removeElement($enseigne);
    }

    /**
     * Get enseignes
     *
     * @return ArrayCollection
     */
    public function getEnseignes()
    {
        return $this->enseignes;
    }

    /**
     * @param Enseigne $enseignes
     */
    public function setEnseignes($enseignes)
    {
        $this->enseignes = $enseignes;
    }

    /**
     * @return Disponibilite
     */
    public function getDisponibilites()
    {
        return $this->disponibilites;
    }

    /**
     * @param Disponibilite $disponibilites
     */
    public function setDisponibilites($disponibilites)
    {
        $this->disponibilites = $disponibilites;
    }
}
