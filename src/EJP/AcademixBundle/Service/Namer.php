<?php

namespace EJP\AcademixBundle\Service;

use EJP\AcademixBundle\Entity\Enseignant;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Symfony\Component\HttpFoundation\File\File;

class Namer implements NamerInterface {


    /**
     * Creates a name for the file being uploaded.
     *
     * @param object $object The object the upload is attached to
     * @param PropertyMapping $mapping The mapping to use to manipulate the given object
     *
     * @return string The file name
     */
    public function name($object, PropertyMapping $mapping)
    {
        /** @var File $file
         */
        $file = $object->getMyFile();
        $extension = $file->guessExtension();

        return uniqid('', true).'.'.$extension;
    }
}