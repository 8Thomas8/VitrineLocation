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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Rest\Route("/api")
 * @IsGranted("IS_AUTHENTICATED_FULLY")
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
     * @IsGranted ("ROLE_FOO")
     */
    public function createAction(Request $request): JsonResponse
    {
        $content = $request->toArray();
        $title = $content['title'];
        $message = $content['message'];

        if (empty($title)) {
            throw new BadRequestHttpException('Title cannot be empty');
        }
        if (empty($message)) {
            throw new BadRequestHttpException('Message cannot be empty');
        }

        $feature = new Feature();
        $feature->setTitle($title);
        $feature->setMessage($message);
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