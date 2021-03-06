<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\RegistrationFormType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {   
        $pageSelected = "login";
        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'pageSelected' => $pageSelected, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="sec_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
