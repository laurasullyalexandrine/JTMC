<?php

namespace App\Controller\Admin;

use App\Entity\InformationPayment;
use App\Entity\Store;
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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("J'trouve Mon Commercant");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Commerçant', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Commerce', 'fas fa-store', Store::class);
        yield MenuItem::linkToCrud('Information de payement', 'fas fa-store', InformationPayment::class);
    }
}
