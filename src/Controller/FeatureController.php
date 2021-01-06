<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Feature;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Rest\Route("/api")
 */
final class FeatureController extends AbstractController
{
    /** @var EntityManagerInterface */
    private $em;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Rest\Post("/features", name="createFeature")
     */
    public function createAction(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        if (empty($message)) {
            throw new BadRequestHttpException('message cannot be empty');
        }
        if (empty($title)) {
            throw new BadRequestHttpException('title cannot be empty');
        }
        $feature = new Feature();
        $feature->setMessage($message);
        $feature->setTitle($title);
        $this->em->persist($feature);
        $this->em->flush();
        $data = $this->serializer->serialize($feature, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/features", name="findAllFeatures")
     */
    public function findAllAction(): JsonResponse
    {
        $features = $this->em->getRepository(Feature::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($features, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}