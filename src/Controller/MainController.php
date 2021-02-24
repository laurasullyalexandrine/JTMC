<?php

namespace App\Controller;

use App\Entity\Store;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

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
         * @Route("/get", name="api")
         */
        public function map(StoreRepository $storeRepository, SerializerInterface $serializerInterface): Response
        {
            $store = $storeRepository->findAll();
            // var_dump($store);
            return $this->json($store, 200, [], [
                AbstractNormalizer::IGNORED_ATTRIBUTES => [
                        'user'
                ]
            ]);dump($store);
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


        /**
        * @Route("/mentions-legales", name="legal_mention")
        */
        public function legal (): Response
        {
            return $this->render('main/legal_mention.html.twig');
        }
    }