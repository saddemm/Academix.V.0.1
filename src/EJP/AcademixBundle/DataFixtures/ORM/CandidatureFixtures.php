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
use EJP\AcademixBundle\Entity\Candidature;

class CandidatureFixtures extends Fixture
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
            $candidature = new Candidature();
            $candidature->setNom('NomCandidat '.$i);
            $candidature->setPrenom('PrenCandidat '.$i);
            $candidature->setTelephone("22039201");
            $candidature->setEmail("candidat".$i."@itdesire.io");
            $candidature->setCv("lienCV ".$i);

            $manager->persist($candidature);
        }

        $manager->flush();
    }
}