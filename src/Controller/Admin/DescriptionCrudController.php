<?php

namespace App\Controller\Admin;

use App\Entity\Description;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DescriptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Description::class;
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
