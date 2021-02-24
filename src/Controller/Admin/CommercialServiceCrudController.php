<?php

namespace App\Controller\Admin;

use App\Entity\CommercialService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommercialServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CommercialService::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
