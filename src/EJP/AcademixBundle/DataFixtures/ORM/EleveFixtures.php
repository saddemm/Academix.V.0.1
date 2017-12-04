<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 21/11/2017
 * Time: 18:30
 */

namespace EJP\AcademixBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Parents;

class EleveFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $parent = new Parents();
        $parent->setPrenom("Soiei");
        $parent->setNom("SIe");
        $parent->setEmail("SIseos");
        $parent->setAdr("SOskaoisa");
        $parent->setMethodeContact("OISoeie");
        $parent->setTel("S0Keiosk");
        $parent->setResponsable("OSkes");

        $parents=new ArrayCollection();
        $parents->add($parent);

        // create 20 products! Bam!
        for ($i = 0; $i < 3; $i++) {
            $eleve = new Eleve();
            $parent->setEleve($eleve);

            $eleve->setNom('NomEns '.$i);
            $eleve->setPrenom('PrenomEns '.$i);
            $eleve->setUsername('setUsername '.$i);
            $eleve->setPassword('setPassword '.$i);
            $eleve->setEmail('setEmail '.$i);
            $eleve->setAdresse('setAdresse '.$i);
            $eleve->setRoles(['ROLE_ELEVE']);
            $eleve->setImageName("tester.jpg");
            $eleve->setDateNaissance(new \DateTime());
            $eleve->setTelephone("2205826".$i);
            $eleve->setSex("H");
            $eleve->addParent($parent);


            $manager->persist($eleve);
            $this->addReference('eleve'.$i, $eleve);

        }

        $manager->flush();
    }
}