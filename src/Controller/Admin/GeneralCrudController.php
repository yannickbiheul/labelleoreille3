<?php

namespace App\Controller\Admin;

use App\Entity\General;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GeneralCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return General::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('phraseTitre'),
            TextEditorField::new('citation'),
            TextEditorField::new('description'),
            TextField::new('proprietaire'),
            ImageField::new('photo')->setUploadDir("public/backgrounds")
                                    ->setBasePath("/backgrounds")
                                    ->setRequired(false),
        ];
    }
    
}
