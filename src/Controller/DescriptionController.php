<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\ControllerInterface\EntityController;
use App\Entity\Description;
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
 *
 */
//@IsGranted("IS_AUTHENTICATED_FULLY")
final class DescriptionController extends AbstractController implements EntityController
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
     * @Rest\Post("/descriptions", name="createDescription")
     * @IsGranted ("ROLE_ADMIN")
     */
    public function createAction(Request $request): JsonResponse
    {
        $content = $request->toArray();
        $orderNb = $content['orderNb'];
        $title = $content['title'];
        $message = $content['message'];

        if (empty($orderNb)) {
            throw new BadRequestHttpException('Order cannot be empty');
        }
        if (empty($title)) {
            throw new BadRequestHttpException('Title cannot be empty');
        }
        if (empty($message)) {
            throw new BadRequestHttpException('Message cannot be empty');
        }

        $description = new Description();
        $description->setOrderNb($orderNb);
        $description->setTitle($title);
        $description->setMessage($message);
        $this->em->persist($description);
        $this->em->flush();
        $data = $this->serializer->serialize($description, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/descriptions", name="findAllDescriptions")
     */
    public function findAllAction(): JsonResponse
    {
        $descriptions = $this->em->getRepository(Description::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($descriptions, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Get("/descriptions/{id}", name="findOneDescription")
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse
    {
        $description = $this->em->getRepository(Description::class)->find($id);
        $data = $this->serializer->serialize($description, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Put("/descriptions/{id}", name="UpdateOneDescription")
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * @IsGranted ("ROLE_ADMIN")

     */
    public function updateOneAction(Request $request, string $id): JsonResponse
    {
        $description = $this->em->getRepository(Description::class)->find($id);
        $descriptionUpdated = json_decode($request->getContent(), true);

        empty($descriptionUpdated['orderNb']) ? true : $description->setOrderNb($descriptionUpdated['orderNb']);
        empty($descriptionUpdated['title']) ? true : $description->setTitle($descriptionUpdated['title']);
        empty($descriptionUpdated['message']) ? true : $description->setMessage($descriptionUpdated['message']);

        $this->em->persist($description);
        $this->em->flush();
        $data = $this->serializer->serialize($description, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Delete("/descriptions/{id}", name="DeleteOneDescription")
     * @param string $id
     * @return JsonResponse
     * @IsGranted ("ROLE_ADMIN")
     */
    public function deleteOneAction(string $id): JsonResponse
    {
        $description = $this->em->getRepository(Description::class)->find($id);

        $this->em->remove($description);
        $this->em->flush();

        return new JsonResponse("Description deleted", Response::HTTP_OK, [], true);
    }
}