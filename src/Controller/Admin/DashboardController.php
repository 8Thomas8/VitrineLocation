<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CrudController\DescriptionCrudController;
use App\Controller\IndexController;
use App\Entity\Access;
use App\Entity\Description;
use App\Entity\Image;
use App\Entity\Poi;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\MenuItemTrait;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
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
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Page Informations');
        yield MenuItem::linkToCrud('Descriptions', 'fa fa-tags', Description::class);
        yield MenuItem::linkToCrud('POIs', 'fa fa-tags', Poi::class);
        yield MenuItem::linkToCrud('Accès', 'fa fa-tags', Access::class);

        yield MenuItem::section('Page Photos');
        yield MenuItem::linkToCrud('Images', 'fa fa-tags', Image::class);
    }
}
