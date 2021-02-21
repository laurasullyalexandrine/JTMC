<?php

namespace App\Controller;


use App\Entity\Store;
use App\Form\StoreType;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;


/**
 * @Route("/store")
 */
class StoreController extends AbstractController
{

    
    /**
    *display the list of store
    *
    *@Route("/", name="store_index", methods={"GET"})
    */
    public function index(StoreRepository $storeRepository): Response
    {
        return $this->render('store/index.html.twig', [
            'stores' => $storeRepository->findAll(),
        ]);
    }
    
    /**
    *Created stores
    *
    * @Route("/new", name="store_create", methods= {"GET", "POST"})
    *
    * @param Request $request
    * @return Response
    */
    public function create(Request $request, FileUploader $fileUploader): Response
    {
        $store = new Store();
        $form = $this->createForm(StoreType::class, $store);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $store = $form->getData();
            $store->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($store);
            $em->flush();

            $picture = $form->get('picture')->getData();
            $fileUploader->moveStorePicture($picture, $store);

            $em->flush();

            $this->addFlash('success', 'Votre commerce a été ajouté');
        
            return $this->redirectToRoute('store_index');
        }
        
        return $this->render('store/new.html.twig', 
        [
        'store' => $store,
        'form' => $form->createView()
        ]);
    }

    /**
    * Displays stores    
    *
    * @Route("/{id}", name="store_read", methods={"GET"})
    *
    * @param Store $store
    * @return Response
    */
    public function read(Store $store): Response 
    {
        return $this->render('store/read.html.twig', 
        [
            'store' => $store,
        ]);
    }

    /**
     * Modifies Stores
     * 
     * @Route("/{id}/edit", name="store_edit", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param Store $store
     * @return Response
     */
    public function edit(Request $request, Store $store): Response
    {
        $form = $this->createForm(StoreType::class, $store);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture = $form->get('picture')->getData();
            $fileUploader->moveStorePicture($picture, $store);

            $this->getDoctrine()->getManager()->flush();
            
            $this->addFlash('success', "vous avez modifié votre commerce");

            return $this->redirectToRoute('store_index');
        }

        return $this->render(
            'store/edit.html.twig',
            [
                'store' => $store,
                'form' => $form->createView(),
            ]);
    }

    /**
     * Clear stores
     * 
     * @Route("/{id}", name="store_delete", methods={"DELETE"})
     *
     *
     * @param Request $request
     * @param Store $store
     * @return Response
     */
    public function delete(Request $request, Store $store): Response
    {
        if ($this->isCsrfTokenValid('delete'. $store->getId(), $request->request->get('_token')))
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($store);
            $em->flush();
        }
        
        return $this->redirectToRoute('store_index');
    }
}