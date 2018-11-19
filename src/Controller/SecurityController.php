<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController{


    /**
     * @Route("login", name="login")
     */
    public function login(AuthenticationUtils $authenticationutils)
    {
        $error = $authenticationutils->getLastAuthenticationError();
        $lastUsername = $authenticationutils->getLastUsername();
        return $this->render('security/login.html.twig',[
            'lastUsername' => $lastUsername,
            'error' => $error,
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    
    }
}