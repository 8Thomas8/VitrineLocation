<?php

declare(strict_types=1);

namespace App\Controller\ControllerInterface;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Rest\Route("/api")
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
interface EntityController
{
    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer);


    public function findAllAction(): JsonResponse;

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse;
}