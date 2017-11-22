<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 21/11/2017
 * Time: 18:30
 */

namespace EJP\AcademixBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use EJP\AcademixBundle\Entity\Eleve;

class EleveFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 5; $i++) {
            $eleve = new Eleve();
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
            $eleve->setMethodeContact("Telephone".$i);

            $manager->persist($eleve);
            $this->addReference('eleve'.$i, $eleve);
        }

        $manager->flush();
    }
}