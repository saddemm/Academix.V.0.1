<?php

namespace EJP\AcademixBundle\Entity;

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




    /**
     * @var Etude
     * One eleve has Many etudes.
     * @ORM\OneToMany(targetEntity="Etude", mappedBy="eleve")
     */

    private $etude;



    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Parents", inversedBy="eleve",cascade={"persist"})
     * @ORM\JoinColumn(name="parents_id", referencedColumnName="id")
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

}

