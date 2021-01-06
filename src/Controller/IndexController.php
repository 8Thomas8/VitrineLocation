<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", requirements={"vueRouting"="^(?!api|_(profiler|wdt)).*"}, name="vue-index")
     * @return Response
     */
    public function vueRouting(): Response
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/", requirements={"vueRouting"="^(?!api|_(profiler|wdt)).*"}, name="base-index")
     * @return Response
     */
    public function baseTemplate(): Response
    {
        return $this->render('base.html.twig', []);
    }
}