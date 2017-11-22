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
use EJP\AcademixBundle\Entity\Etude;
use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Classe;

class EtudeFixtures extends Fixture
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

            $etude = new Etude();
            $etude->setAnneeScolaire('200'.$i);
            $etude->setMoyenne(10);
            $etude->setNiveau(1);
            $etude->setSucces(1);
            $etude->setClasse($this->getReference('classe'.$i));
            $etude->setEleve($this->getReference('eleve1'));
            $manager->persist($etude);
        }



        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClasseFixtures::class,
            EleveFixtures::class
        );
    }
}