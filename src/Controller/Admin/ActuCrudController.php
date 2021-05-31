<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('contenu'),
            ImageField::new('image')->setUploadDir("public/images")
                                    ->setBasePath("/images")
                                    ->setRequired(false),
        ];
    }
    
}
