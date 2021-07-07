<?php

namespace App\Controller\Admin;

use App\Entity\Audio;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AudioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Audio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            ImageField::new('lien')->setUploadDir("public/audios")
                                    ->setBasePath("/audios")
                                    ->setRequired(false),
        ];
    }
    
}
