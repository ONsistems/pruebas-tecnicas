<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
	{
	    $error = $authenticationUtils->getLastAuthenticationError();
	    $lastUsername = $authenticationUtils->getLastUsername();
	    return $this->render('security/login.html.twig', [
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ]);
	}

	/**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    	throw new \Exception('this should not be reached!');
    }
}