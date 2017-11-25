<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parent
 *
 * @ORM\Table(name="parents")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\ParentRepository")
 */
class Parents
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
     * @ORM\Column(name="nom_mere", type="string", length=50, nullable=true)
     */
    private $nomMere;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pere", type="string", length=50, nullable=true)
     */
    private $nomPere;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_mere", type="string", length=50, nullable=true)
     */
    private $telMere;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_pere", type="string", length=50, nullable=true)
     */
    private $telPere;

    /**
     * @var string
     *
     * @ORM\Column(name="email_mere", type="string", length=50, nullable=true)
     */
    private $emailMere;

    /**
     * @var string
     *
     * @ORM\Column(name="email_pere", type="string", length=50, nullable=true)
     */
    private $emailPere;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_mere", type="string", length=50, nullable=true)
     */
    private $adrMere;

    /**
     * @var string
     *
     * @ORM\Column(name="adr_pere", type="string", length=50, nullable=true)
     */
    private $adrPere;

    /**
     * @var string
     *
     * @ORM\Column(name="methode_contact", type="string", length=50)
     */
    private $methodeContact;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=50)
     */

    private $responsable;


    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Eleve", mappedBy="parents")
     */

    private $eleve;


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
     * Set nomMere
     *
     * @param string $nomMere
     *
     * @return Parents
     */
    public function setNomMere($nomMere)
    {
        $this->nomMere = $nomMere;

        return $this;
    }

    /**
     * Get nomMere
     *
     * @return string
     */
    public function getNomMere()
    {
        return $this->nomMere;
    }

    /**
     * Set nomPere
     *
     * @param string $nomPere
     *
     * @return Parents
     */
    public function setNomPere($nomPere)
    {
        $this->nomPere = $nomPere;

        return $this;
    }

    /**
     * Get nomPere
     *
     * @return string
     */
    public function getNomPere()
    {
        return $this->nomPere;
    }

    /**
     * Set telMere
     *
     * @param string $telMere
     *
     * @return Parents
     */
    public function setTelMere($telMere)
    {
        $this->telMere = $telMere;

        return $this;
    }

    /**
     * Get telMere
     *
     * @return string
     */
    public function getTelMere()
    {
        return $this->telMere;
    }

    /**
     * Set telPere
     *
     * @param string $telPere
     *
     * @return Parents
     */
    public function setTelPere($telPere)
    {
        $this->telPere = $telPere;

        return $this;
    }

    /**
     * Get telPere
     *
     * @return string
     */
    public function getTelPere()
    {
        return $this->telPere;
    }

    /**
     * Set emailMere
     *
     * @param string $emailMere
     *
     * @return Parents
     */
    public function setEmailMere($emailMere)
    {
        $this->emailMere = $emailMere;

        return $this;
    }

    /**
     * Get emailMere
     *
     * @return string
     */
    public function getEmailMere()
    {
        return $this->emailMere;
    }

    /**
     * Set emailPere
     *
     * @param string $emailPere
     *
     * @return Parents
     */
    public function setEmailPere($emailPere)
    {
        $this->emailPere = $emailPere;

        return $this;
    }

    /**
     * Get emailPere
     *
     * @return string
     */
    public function getEmailPere()
    {
        return $this->emailPere;
    }

    /**
     * Set adrMere
     *
     * @param string $adrMere
     *
     * @return Parents
     */
    public function setAdrMere($adrMere)
    {
        $this->adrMere = $adrMere;

        return $this;
    }

    /**
     * Get adrMere
     *
     * @return string
     */
    public function getAdrMere()
    {
        return $this->adrMere;
    }

    /**
     * Set adrPere
     *
     * @param string $adrPere
     *
     * @return Parents
     */
    public function setAdrPere($adrPere)
    {
        $this->adrPere = $adrPere;

        return $this;
    }

    /**
     * Get adrPere
     *
     * @return string
     */
    public function getAdrPere()
    {
        return $this->adrPere;
    }

    /**
     * Set methodeContact
     *
     * @param string $methodeContact
     *
     * @return Parents
     */
    public function setMethodeContact($methodeContact)
    {
        $this->methodeContact = $methodeContact;

        return $this;
    }

    /**
     * Get methodeContact
     *
     * @return string
     */
    public function getMethodeContact()
    {
        return $this->methodeContact;
    }

    /**
     * @return mixed
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * @param mixed $eleve
     */
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param string $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

}

