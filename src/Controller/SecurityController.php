<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

final class SecurityController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/admin/login", name="boLogin")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            // parameters usually defined in Symfony login forms
            'error' => $error,
            'last_username' => $lastUsername,

            // OPTIONAL parameters to customize the login form:

            // the translation_domain to use (define this option only if you are
            // rendering the login template in a regular Symfony controller; when
            // rendering it from an EasyAdmin Dashboard this is automatically set to
            // the same domain as the rest of the Dashboard)
            'translation_domain' => 'admin',

            // the title visible above the login form (define this option only if you are
            // rendering the login template in a regular Symfony controller; when rendering
            // it from an EasyAdmin Dashboard this is automatically set as the Dashboard title)
            'page_title' => 'Back Office',

            // the string used to generate the CSRF token. If you don't define
            // this parameter, the login form won't include a CSRF token
            'csrf_token_intention' => 'authenticate',

            // the URL users are redirected to after the login (default: '/admin')
            'target_path' => $this->generateUrl('admin'),

            // the label displayed for the username form field (the |trans filter is applied to it)
            'username_label' => 'Pseudo',

            // the label displayed for the password form field (the |trans filter is applied to it)
            'password_label' => 'Mot de passe',

            // the label displayed for the Sign In form button (the |trans filter is applied to it)
            'sign_in_label' => 'Log in',

            // the 'name' HTML attribute of the <input> used for the username field (default: '_username')
            // 'username_parameter' => 'my_custom_username_field',

            // the 'name' HTML attribute of the <input> used for the password field (default: '_password')
            // 'password_parameter' => 'my_custom_password_field',
        ]);
    }

//  Pour Login Logout en api
//    /**
//     * @Route("/api/security/login", name="login")
//     */
//    public function loginAction(): JsonResponse
//    {
//        /** @var User $user */
//        $user = $this->getUser();
//        $userClone = clone $user;
//        $userClone->setPassword('');
//        $data = $this->serializer->serialize($userClone, JsonEncoder::FORMAT);
//
//        return new JsonResponse($data, Response::HTTP_OK, [], true);
//    }
//
//    /**
//     * @throws RuntimeException
//     *
//     * @Route("/api/security/logout", name="logout")
//     */
//    public function logoutAction(): void
//    {
//        throw new RuntimeException('This should not be reached!');
//    }
}