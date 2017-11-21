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
use EJP\AcademixBundle\Entity\Enseignant;
use EJP\AcademixBundle\Entity\Eleve;

class EnseignantFixtures extends Fixture
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
            $enseignant = new Enseignant();
            $enseignant->setNom('NomEns '.$i);
            $enseignant->setPrenom('PrenomEns '.$i);
            $enseignant->setUsername('setUsername '.$i);
            $enseignant->setPassword('setPassword '.$i);
            $enseignant->setEmail('setEmail '.$i);
            $enseignant->setAdresse('setAdresse '.$i);
            $enseignant->setRoles(['ROLE_ENSEIGNANT']);
            $enseignant->setImageName("tester.jpg");
            $enseignant->setDateNaissance(new \DateTime());
            $enseignant->setDateRecrutement(new \DateTime());
            $enseignant->setTelephone("2205826".$i);

            $manager->persist($enseignant);
        }

        $manager->flush();
    }
}