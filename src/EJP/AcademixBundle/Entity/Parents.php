<?php

namespace EJP\AcademixBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parents
 *
 * @ORM\Table(name="parents")
 * @ORM\Entity(repositoryClass="EJP\AcademixBundle\Repository\ParentsRepository")
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=50)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adr", type="string", length=100)
     */
    private $adr;

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
     *
     * @ORM\ManyToOne(targetEntity="Eleve", inversedBy="parents")
     * @ORM\JoinColumn(name="eleve_id", referencedColumnName="id")
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Parents
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Parents
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Parents
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Parents
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adr
     *
     * @param string $adr
     *
     * @return Parents
     */
    public function setAdr($adr)
    {
        $this->adr = $adr;

        return $this;
    }

    /**
     * Get adr
     *
     * @return string
     */
    public function getAdr()
    {
        return $this->adr;
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
     * Set responsable
     *
     * @param string $responsable
     *
     * @return Parents
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
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

}

