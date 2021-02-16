<?php

namespace App\Controller;

use App\Entity\Store;
use App\Form\StoreType;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/store")
 */

class StoreController extends AbstractController
{
    /**
     * @Route("/{id}", name="store_read", methods={"GET"})
     */
    public function read(Store $store): Response 
    {
        return $this->render('store/read.html.twig', 
        [
            'store' => $store,
        ]);
    }
    
    /**
     * @Route("/new", name="store_create", methods={"GET", "POST"})
     */
    public function create(Request $request): Response
    {
        $store = new Store();
        $form = $this->createForm(StoreType::class, $store);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($store);
            $em->flush();
        
            return $this->redirectToRoute('store_read');
        }

        return $this->render('store/new.html.twig', 
        [
        'store' => $store,
        ]);
    }
}