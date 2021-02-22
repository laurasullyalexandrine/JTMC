<?php

namespace App\Service;

use App\Entity\Store;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $storeFolder;

    public function __construct($storeFolder)
    {
        $this->storeFolder = $storeFolder;
    }

    /**
     * Et la j'ai la meme fonctionnalité dédiée à un cas particulier
     *
     * @param UploadedFile|null $image on autorise le null si jamais aucune image n'a été fournie
     * @return string|null
     */
    function movePicture(?UploadedFile $picture, string $targetFolder, $prefix = ''): ?string
    {
        $newFilename = null;

        if ($picture !== null) {
            // on a décidé d'appeler notre fichier
            $newFilename = $prefix . uniqid() . '.' . $picture->guessExtension();

            // Move the file to the directory where brochures are stored
            $picture->move(
                $targetFolder,
                $newFilename
            );
        }
        return $newFilename;
    }

    function moveStorePicture(?UploadedFile $picture, Store $store)
    {
        $pictureName = $this->movePicture($picture, $this->storeFolder, 'store-');
        if ($pictureName !== null) {
            $store->setPicture($pictureName);
         }
    }
}
