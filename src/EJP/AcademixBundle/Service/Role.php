<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 22/11/2017
 * Time: 09:36
 */

namespace EJP\AcademixBundle\Service;

use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Enseignant;
use EJP\AcademixBundle\Entity\Utilisateur;

class Role{

    /**
     * @param Utilisateur $obj
     * @return array
     */
    public static function roleFinder(Utilisateur $obj){
        if ($obj instanceof Eleve){
            return (['ROLE_ELEVE']);
        }elseif ($obj instanceof Enseignant){
            return(['ROLE_ENSEIGNANT']);
        }
    }

    public function listEtude(){
        return $this->getDoctrine()
            ->getRepository(Eleve::class)
            ->findAllOrderedByName();

    }
}