<?php

namespace App\Controller\Admin;
use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Produit;
use App\Entity\Client;
use App\Entity\Facture;
use App\Entity\Stock;
use App\Entity\Inventaire;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<i>Tous_Pour_Vous </i>');
          
           
          
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-cart-arrow-down', Produit::class);
        yield MenuItem::linkToCrud('Client', '		fas fa-money-check-alt', Client::class);
        yield MenuItem::linkToCrud('Commande', '	fas fa-handshake', Commande::class);
        yield MenuItem::linkToCrud('Facture', '	fas fa-edit', Facture::class);
        yield MenuItem::linkToCrud('Stock', '		fas fa-store-slash',Stock::class);
        yield MenuItem::linkToCrud(' Inventaire', '	fas fa-chalkboard-teacher', Inventaire::class);
        yield MenuItem::linkToCrud('  User', '		fas fa-power-off',  User::class);
    }
}
