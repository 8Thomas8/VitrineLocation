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

    /**
     * @param Request $request
     * @return JsonResponse
     * @Rest\Post("/descriptions", name="createDescription")
     * @IsGranted ("ROLE_FOO")
     */
    public function createAction(Request $request): JsonResponse;

    /**
     * @Rest\Get("/descriptions", name="findAllDescriptions")
     */
    public function findAllAction(): JsonResponse;

    /**
     * @Rest\Get("/descriptions/{id}", name="findOneDescription")
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse;

    /**
     * @Rest\Put("/descriptions/{id}", name="UpdateOneDescription")
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function updateOneAction(Request $request, string $id): JsonResponse;

    /**
     * @Rest\Delete("/descriptions/{id}", name="DeleteOneDescription")
     * @param string $id
     * @return JsonResponse
     */
    public function deleteOneAction(string $id): JsonResponse;
}