<?php

namespace App\Controller;
//use App\Entity\Produit;
use App\Entity\Produit;
use App\Repository\ClientRepository;
use App\Repository\FactureRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  /*  private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }
*/


    /**
     * @Route("/home", name="home")
     */
    public function index(ProduitRepository $produitRepository): Response
    { 
   
        //$produit =$this->entityManager->getRepository(className Produit::class)->findAll();
        return $this->render('home/produit.html.twig',[
            'produits'=> $produitRepository->lastTree(),
        ]);
           
    }


     /**
     * @Route("/client", name="client")
     */
    public function in(ClientRepository $clientRepository): Response
    { 
   
        //$produit =$this->entityManager->getRepository(className Produit::class)->findAll();
        return $this->render('home/clients.html.twig',
        [
            'clients'=>$clientRepository->PREMIER(),
        ]
            );
           
    }


      /**
     * @Route("/facture", name="facture")
     */
    public function facturetion(FactureRepository $FactureRepository,ClientRepository $clientRepository): Response
    { 
   
        //$produit =$this->entityManager->getRepository(className Produit::class)->findAll();
        return $this->render('home/facturation.html.twig',
        [
            'factures'=>$FactureRepository->facture(),
            'clients'=>$clientRepository->PREMIER(),
        ]
            );
           
    }

}
