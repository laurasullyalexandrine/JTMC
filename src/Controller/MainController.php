<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 */
 class MainController extends AbstractController
    {
        /**
         * @Route("/", name="home", methods="GET")
         */
        public function homepage(): Response
        {
            return $this->render('main/home.html.twig');
        }

        /**
         * @Route("/mention", name="legal_mention", methods="GET")
         */
        public function mention(): Response
        {
            return $this->render('main/legals-mentions.html.twig');
        }
    }