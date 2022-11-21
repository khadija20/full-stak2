<?php

namespace App\Controller\Admin;

use App\Entity\Inventaire;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InventaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Inventaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             TextField::new('nom'),
            AssociationField::new('Stock'),
            TextEditorField::new('adresse'),
            NumberField::new('code')
        ];
    }
    
}
