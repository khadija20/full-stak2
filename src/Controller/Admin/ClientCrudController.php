<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('adresse'),
            TextField::new('telephone'),
            TextField::new('typeclient'),
            TextField::new('numerotva'),
            TextField::new('ICE'),
            TextField::new('responsbale'),
            TextField::new('rib'),
            TextField::new('banque'),
            TextField::new('ville'),
            TextField::new('email'),
            TextField::new('banque')
           


        ];
    }
   
}
