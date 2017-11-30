<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\EleveRepository")
 */
class Eleve extends Utilisateur
{


    public function __construct()
    {
        parent::__construct();
        $this->parents = new ArrayCollection();

    }


    /**
     * @var Etude
     * One eleve has Many etudes.
     * @ORM\OneToMany(targetEntity="Etude", mappedBy="eleve")
     */

    private $etude;


    /**
     * @var Parents
     * @ORM\OneToMany(targetEntity="Parents", mappedBy="eleve",cascade={"persist"})
     */

    private $parents;


    /**
     * @return Etude
     */
    public function getCurrentEtude()
    {
        $year =  2004;
        $etude = null;
        $i = 0;

        while($etude == null && $i<count($this->getEtude())){
            if($this->getEtude()[$i]->getAnneeScolaire()==$year){
                $etude=$this->getEtude()[$i];
            }
            $i++;
        }

        return $etude;
    }


    /**
     * @return Etude
     */
    public function getEtude()
    {
        return $this->etude;
    }

    /**
     * @param mixed $etude
     */
    public function setEtude($etude)
    {
        $this->etude = $etude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param mixed $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
        return $this;
    }




    /**
     * Add etude
     *
     * @param \EJP\AcademixBundle\Entity\Etude $etude
     *
     * @return Eleve
     */
    public function addEtude(\EJP\AcademixBundle\Entity\Etude $etude)
    {
        $this->etude[] = $etude;

        return $this;
    }

    /**
     * Remove etude
     *
     * @param \EJP\AcademixBundle\Entity\Etude $etude
     */
    public function removeEtude(\EJP\AcademixBundle\Entity\Etude $etude)
    {
        $this->etude->removeElement($etude);
    }

    /**
     * Add parent
     *
     * @param \EJP\AcademixBundle\Entity\Parents $parent
     *
     * @return Eleve
     */
    public function addParent(\EJP\AcademixBundle\Entity\Parents $parent)
    {
        $parent->setEleve($this);
        $this->parents[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \EJP\AcademixBundle\Entity\Parents $parent
     */
    public function removeParent(\EJP\AcademixBundle\Entity\Parents $parent)
    {
        $this->parents->removeElement($parent);
    }
}
