<?php

namespace App\DataFixtures;

use App\Entity\Categorie as EntityCategorie;
use App\Entity\Produit;
use App\Entity\User;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
use Proxies\__CG__\App\Entity\Categorie as AppEntityCategorie;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class AppFixtures extends Fixture
{
private $encoder;
public function __construct(UserPasswordEncoderInterface $encoder)
{
    $this->encoder=$encoder;
}

    public function load(ObjectManager $manager)
    {

      
       $faker = Factory::create('fr_FR');
        $user= new User();
        $user->setEmail('user@test.com');
        

    $password= $this->encoder->encodePassword($user,'password');
    $user->setPassword($password);
    $manager->persist($user);
    
    for ($i=0; $i < 10; $i++) {
 $categorie=new Categorie();
 $categorie->setLebel($faker->text(10));
 $categorie->setStatu($faker->text(10));
 $manager->persist($categorie);
    }
    for ($i=0; $i < 10; $i++) {

    $produit= new Produit();
    
    $produit->setDescription($faker->text(10));
    $produit->setImage($faker->imageUrl('uploads/images/products/611d72ab11888890643051.jpg'));
    
    $produit->setNom($faker->text(350));
    $produit->setPrix($faker->numberBetween(2,5));
    $produit->setQuantite($faker->numberBetween(2,5));
    $produit->setStatu($faker->text(20));

 
    $produit->setCategorie($categorie);
   
    $manager->persist($produit);
            

    }



        $manager->flush();
    }
}
