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
        * This function manage the city form and filters activities of responsive menu
        */
        public function homepage (Request $request,SessionInterface $session): Response
        {
           // dump($request);
           $activity = $request->query->get('activity');
           // dump($activity);
           $filter = $request->query->get('filter');
           
           $reset = $request->query->get('reset');
           // dump($reset);
           if($request->getMethod() === Request::METHOD_POST){
                $session->set('search-city',$request->request->get('city'));
           }
           // dump($session);
           if($activity){
               $session->set('activity',$activity);
           }
           if($filter){
               $session->set('filter',$filter);
           }
           if($reset){
            $session->remove('activity');
            $session->remove('search-city');
            
            return $this->redirectToRoute('home');
           }
            return $this->render('main/home.html.twig');
        }

        /**
         * This function display map markers from database and use custom function for active activity filters
         * @Route("/get", name="apiActivity")
         */
        public function mapActivity(StoreRepository $storeRepository, SessionInterface $session): Response
        {
            $store = $storeRepository->findByActivity($session);
            dump($store);
            
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
         * This function display map markers from database and use custom function for active activity filters
         * @Route("/get", name="apiActivity")
        */
        public function mapService(CommercialServiceRepository $commercialServiceRepository, SessionInterface $session): Response
        {
            $storeCommercial = $commercialServiceRepository->findStoreByCommercialService($session);
            //dump($storeCommercial);

            return $this->json($storeCommercial, 200, [], [
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
