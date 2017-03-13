<?php

namespace OCUserBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use OCUserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller

{



    public function loginAction(Request $request)
    {

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirectToRoute('logge');
        }
        $authenticationUtils = $this->get('security.authentication_utils');
        return $this->render('login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }
}

