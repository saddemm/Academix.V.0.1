<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 21/11/2017
 * Time: 13:04
 */

namespace EJP\AcademixBundle\Service;

use EJP\AcademixBundle\Entity\Utilisateur;

class Generator{
    public static function generatePassword(){
        return random_int(100000, 999999);

    }

    public static function generateLogin(Utilisateur $utilisateur){

        $login_random = random_int(10, 99);
        return strtolower($utilisateur->getPrenom().'.'.$utilisateur->getNom().$login_random);

    }
}


