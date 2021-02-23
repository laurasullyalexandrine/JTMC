<?php

namespace App\Controller;

use App\Entity\Store;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


 class MainController extends AbstractController
    {


        /**
        * @Route("/", name="home")
        */
        public function homepage (): Response
        {
            return $this->render('main/home.html.twig');
        }

        /**
        *@Route("/stores", name="store_index")
        */
        public function index(StoreRepository $storeRepository): Response
        {   
            
            return $this->render('main/store_list.html.twig', [
                'stores' => $storeRepository->findAll(),
            ]);
        }


        /** 
        * @Route("/{id}", name="store_read", requirements={"id": "\d+"})
        */
        public function show(Store $store): Response 
        {
             return $this->render('main/store_read.html.twig', 
             [
                 'store' => $store,
             ]);
        }
    }