<?php

declare(strict_types=1);

namespace App\Controller;

use function Safe\json_decode;
use App\Controller\ControllerInterface\EntityController;
use App\Entity\Access;
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
 */
final class AccessController extends AbstractController implements EntityController
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
     * @Rest\Post("/accesss", name="createAccess")
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

        $access = new Access();
        $access->setOrderNb($orderNb);
        $access->setTitle($title);
        $access->setMessage($message);
        $this->em->persist($access);
        $this->em->flush();
        $data = $this->serializer->serialize($access, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/access", name="findAllAccess")
     */
    public function findAllAction(): JsonResponse
    {
        $accesss = $this->em->getRepository(Access::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($accesss, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Get("/access/{id}", name="findOneAccess")
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse
    {
        $access = $this->em->getRepository(Access::class)->find($id);
        $data = $this->serializer->serialize($access, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Put("/access/{id}", name="UpdateOneAccess")
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * @IsGranted ("ROLE_ADMIN")
     */
    public function updateOneAction(Request $request, string $id): JsonResponse
    {
        $access = $this->em->getRepository(Access::class)->find($id);
        $accessUpdated = json_decode(strval($request->getContent()), true);

        empty($accessUpdated['orderNb']) ? true : $access->setOrderNb($accessUpdated['orderNb']);
        empty($accessUpdated['title']) ? true : $access->setTitle($accessUpdated['title']);
        empty($accessUpdated['message']) ? true : $access->setMessage($accessUpdated['message']);

        $this->em->persist($access);
        $this->em->flush();
        $data = $this->serializer->serialize($access, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Delete("/access/{id}", name="DeleteOneAccess")
     * @param string $id
     * @return JsonResponse
     * @IsGranted ("ROLE_ADMIN")
     */
    public function deleteOneAction(string $id): JsonResponse
    {
        $access = $this->em->getRepository(Access::class)->find($id);

        $this->em->remove($access);
        $this->em->flush();

        return new JsonResponse("Access deleted", Response::HTTP_OK, [], true);
    }
}