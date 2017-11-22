<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @return mixed
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

