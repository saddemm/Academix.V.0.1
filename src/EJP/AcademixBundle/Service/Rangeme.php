<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 21/11/2017
 * Time: 13:04
 */

namespace EJP\AcademixBundle\Service;


class Rangeme{


    public static function rangeme($from, $to){
        return array_combine(range($from,$to),range($from,$to));
    }

}


