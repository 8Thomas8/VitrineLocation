<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\ControllerInterface\EntityController;
use App\Entity\Poi;
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
final class PoiController extends AbstractController implements EntityController
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
     * @Rest\Post("/pois", name="createPoi")
     * @IsGranted ("ROLE_ADMIN")
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

        $poi = new Poi();
        $poi->setTitle($title);
        $poi->setMessage($message);
        $this->em->persist($poi);
        $this->em->flush();
        $data = $this->serializer->serialize($poi, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/pois", name="findAllPois")
     */
    public function findAllAction(): JsonResponse
    {
        $pois = $this->em->getRepository(Poi::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($pois, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Get("/pois/{id}", name="findOnePoi")
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse
    {
        $poi = $this->em->getRepository(Poi::class)->find($id);
        $data = $this->serializer->serialize($poi, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Put("/pois/{id}", name="UpdateOnePoi")
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function updateOneAction(Request $request, string $id): JsonResponse
    {
        $poi = $this->em->getRepository(Poi::class)->find($id);
        $poiUpdated = json_decode($request->getContent(), true);

        empty($poiUpdated['title']) ? true : $poi->setTitle($poiUpdated['title']);
        empty($poiUpdated['message']) ? true : $poi->setMessage($poiUpdated['message']);

        $this->em->persist($poi);
        $this->em->flush();
        $data = $this->serializer->serialize($poi, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Delete("/pois/{id}", name="DeleteOnePoi")
     * @param string $id
     * @return JsonResponse
     */
    public function deleteOneAction(string $id): JsonResponse
    {
        $poi = $this->em->getRepository(Poi::class)->find($id);

        $this->em->remove($poi);
        $this->em->flush();

        return new JsonResponse("Poi deleted", Response::HTTP_OK, [], true);
    }
}