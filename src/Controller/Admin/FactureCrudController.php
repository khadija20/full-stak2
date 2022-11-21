<?php

namespace App\Controller\Admin;

use App\Entity\Facture;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('numero'),
            AssociationField::new('Produit'),
           
            AssociationField::new('Client'),
            TextField::new('typedeclient'),
            NumberField::new('quantite'),
            NumberField::new('pu'),
            NumberField::new('PHT'),
            NumberField::new('totalHT'),
            NumberField::new('TVA'),
            NumberField::new('TTC'),
            DateField::new('date'),
           
            TextField::new('statudupayement')
           
        ];
    }
  
}
