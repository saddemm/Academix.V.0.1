<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 21/11/2017
 * Time: 13:04
 */

namespace EJP\AcademixBundle\Service;

class Generator{
    public function generatePassword(){
        return random_int(100000, 999999);

    }

    public function generateLogin(){
        return random_int(10, 99);

    }
}


