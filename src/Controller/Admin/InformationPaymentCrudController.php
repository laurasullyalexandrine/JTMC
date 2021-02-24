<?php

namespace App\Controller\Admin;

use App\Entity\InformationPayment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InformationPaymentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InformationPayment::class;
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
