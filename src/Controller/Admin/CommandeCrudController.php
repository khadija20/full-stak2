<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('numero'),
           AssociationField::new('Client'),
           NumberField::new('prixunitaire'),
           NumberField::new('qantite'),
           NumberField::new('tva'),
           NumberField::new('montantHT'),
         
           DateField::new('date')
        ];
    }
  
}
