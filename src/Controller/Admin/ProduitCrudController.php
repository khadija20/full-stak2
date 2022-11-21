<?php

namespace App\Controller\Admin;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    } 

  
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lbele'),
            AssociationField::new('Categorie'),
            TextEditorField::new('description'),
            NumberField::new('prixachat'),
            NumberField::new('prixvente'),
            NumberField::new('TVA'),
            BooleanField::new('produitachte'),
            BooleanField::new('produitvente'),
           
            NumberField::new('quantite'), 
            ImageField::new('image')->onlyOnIndex()
            ->setBasePath($this->params->get('app.path.product_images')),
            TextareaField::new('imageFile')
            ->setFormType(VichImageType ::class) 
            ->hideOnIndex(),
            BooleanField::new('statu')
        ];
    }
   
}
