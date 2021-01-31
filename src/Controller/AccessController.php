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
}