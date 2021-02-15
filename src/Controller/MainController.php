<?php

namespace App\Controller;

/**
 * @Route("/", name="homepage")
 */
use App\Repository\JtmcRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
    {
        /**
         * @Route("/", name="homepage", methods="GET")
         */
        public function homepage (JtmcRepository $jtmcRepository): Response
        {
            return $this->render('main/homepage.html.twig', [
                'homepage' => $jtmcRepository->findAll(),
            ]);
        }
    }