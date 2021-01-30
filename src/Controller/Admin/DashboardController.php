<?php

namespace App\Controller\Admin;

use App\Entity\Access;
use App\Entity\Description;
use App\Entity\Poi;
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
            ->setTitle('Projet VitrineLocation - BackOffice');
    }

    public function configureMenuItems(): iterable
    {
        // links to the 'index' action of the Category CRUD controller
       yield MenuItem::linkToCrud('CRUD Descriptions', 'fa fa-tags', Description::class);
       yield MenuItem::linkToCrud('CRUD POIs', 'fa fa-tags', Poi::class);
       yield MenuItem::linkToCrud('CRUD Accès', 'fa fa-tags', Access::class);
    }
}
