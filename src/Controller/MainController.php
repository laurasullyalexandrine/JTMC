<?php

namespace App\Controller;

use App\Entity\CommercialService;
use App\Entity\InformationPayment;
use App\Entity\Store;
use App\Repository\CommercialServiceRepository;
use App\Repository\InformationPaymentRepository;
use App\Repository\OpenDaysRepository;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class MainController extends AbstractController
    {
        /**
        * @Route("/", name="home")
        */
        public function homepage (Request $request,SessionInterface $session): Response
        {

           $filter = $request->query->get('filter');
           $reset = $request->query->get('reset');
           if($request->getMethod() === Request::METHOD_POST){
                $session->set('zip-city',$request->request->get('city'));
           }
           if($filter){
               $session->set('filter',$filter);
           }
           if($reset){
            $session->remove('filter');
            $session->remove('zip-city');
            
            return $this->redirectToRoute('home');
           }
            return $this->render('main/home.html.twig');
        }

        /**
         * @Route("/get", name="api")
         */
        public function map(StoreRepository $storeRepository,SessionInterface $session): Response
        {
           
            $store = $storeRepository->findByFilter($session);
            return $this->json($store, 200, [], [
                AbstractNormalizer::IGNORED_ATTRIBUTES => [
                        'user',
                        'openDays',
                        'InformationPayment',
                        'CommercialService',
                ]
            ]);
        }

        /**
        *@Route("/commerces", name="store_index")
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
        /**
        * @Route("/team-jtmc", name="team_jtmc")
        */
        public function portrait (): Response
        {
            return $this->render('main/team_jtmc.html.twig');
        }

    }