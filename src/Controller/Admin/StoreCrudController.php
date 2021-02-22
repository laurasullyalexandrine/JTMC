<?php

namespace App\Controller\Admin;

use App\Entity\Store;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class StoreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Store::class;
    }


    //  public function configureFields(string $pageName): iterable
    //  {
    //     return [
    //          ImageField::new('picture')
    //         ->setBasePath('uploads/')
    //         ->SetUploadDir('public/uploads/')
    //         ->setUploadedFileNamePattern('[randomhash].[extension]')
    //          ->setRequired(false),
    //          TextareaField::new('description')
    //      ];
    //  }

}
