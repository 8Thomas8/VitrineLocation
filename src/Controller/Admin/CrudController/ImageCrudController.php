<?php

namespace App\Controller\Admin\CrudController;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('title'),
            ImageField::new('file')
                ->setUploadDir('public\uploads')
                ->setBasePath('uploads'),
            NumberField::new('orderNb'),
            DateTimeField::new('created'),
            DateTimeField::new('updated'),
            BooleanField::new('display')
        ];
    }

}
