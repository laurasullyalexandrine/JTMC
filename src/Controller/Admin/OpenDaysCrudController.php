<?php

namespace App\Controller\Admin;

use App\Entity\OpenDays;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpenDaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpenDays::class;
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
