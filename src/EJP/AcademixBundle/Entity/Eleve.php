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
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="method_contact", type="string", length=255)
     */
    private $methodContact;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date")
     */
    private $dateInscription;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return parent::getId();
    }



    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Eleve
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set methodContact
     *
     * @param string $methodContact
     *
     * @return Eleve
     */
    public function setMethodContact($methodContact)
    {
        $this->methodContact = $methodContact;

        return $this;
    }

    /**
     * Get methodContact
     *
     * @return string
     */
    public function getMethodContact()
    {
        return $this->methodContact;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Eleve
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }


    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }


}

