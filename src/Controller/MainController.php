<?php

namespace App\Controller;

/**
 * @Route("/home", name="homepage")
 */

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
    {
        /**
         * @Route("/", name="homepage", methods="GET")
         */
        public function homepage (): Response
        {
            return $this->render('main/homepage.html.twig');
        }
    }