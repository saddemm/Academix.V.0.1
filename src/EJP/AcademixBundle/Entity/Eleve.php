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
     * @var string
     *
     * @ORM\Column(name="methode_contact", type="string", length=255)
     */
    private $methodeContact;

    /**
     * @var Etude
     * One eleve has Many etudes.
     * @ORM\OneToMany(targetEntity="Etude", mappedBy="eleve")
     */

    private $etude;


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
     * @param string $methodeContact
     */
    public function setMethodeContact($methodeContact)
    {
        $this->methodeContact = $methodeContact;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethodeContact()
    {
        return $this->methodeContact;
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

}

