<?php

namespace App\Controller\Admin\CrudController;

use App\Entity\Access;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class  AccessCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Access::class;
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
