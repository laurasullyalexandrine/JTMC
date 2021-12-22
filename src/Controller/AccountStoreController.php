<?php

namespace App\Controller;

use App\Entity\User;
Use App\Entity\InformationPayment;
use App\Entity\CommercialService;
use App\Entity\Store;
use App\Form\StoreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;



class AccountStoreController extends AbstractController
{
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/commerces", name="account_store")
     */
    public function index(): Response
    {
        return $this->render('account/store.html.twig');
    }

    /**
     * @Route("/compte/ajouter-votre-commerce", name="account_store_add")
     */
    public function add(Request $request, FileUploader $fileUploader ): Response
    {
        $store = new Store();

        $form = $this->createForm(StoreType::class, $store);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // confirmer que l'utilisateur est connecté et qu'il correspond bien au compte
            // du magasin
            $store->setUser($this->getUser());
            $this->entityManager->persist($store);

            $picture = $form->get('picture')->getData();
            $fileUploader->moveStorePicture($picture, $store);

            $this->entityManager->flush();

            $this->addFlash('success', 'Votre commerce à bien été ajouté à votre compte');

            return $this->redirectToRoute('account_store');
        }

        return $this->render('account/store_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/compte/editer-votre-commerce/{id}", name="account_store_edit")
    */
    public function edit(Request $request, Store $store, FileUploader $fileUploader): Response
    {
    
        if (!$store || $store->getUser() != $this->getUser()) {
            return $this->redirectToRoute('account_store');
        }

        $form = $this->createForm(StoreType::class, $store);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture = $form->get('picture')->getData();
            $fileUploader->moveStorePicture($picture, $store);

            $this->entityManager->flush();
            
            return $this->redirectToRoute('account_store');
        }

        return $this->render('account/store_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/compte/supprimer-votre-commerce/{id}", name="account_store_delete")
    */
    public function delete($id, Store $store): Response
    {
        $store = $this->entityManager->getRepository(Store::class)->findOneBy($id);

        if ($store && $store->getUser() == $this->getUser()) {
            $this->entityManager->remove($store);
            $this->entityManager->flush();
        }

            return $this->redirectToRoute('account_store');
    }


    #[Route('/compte/votre-commerce/{id}', name:'account_store_show', methods:['GET'])]
    public function read(Store $store): Response
    {
        // dd($store);
        if (!$store || $store->getUser() != $this->getUser()) {
            return $this->redirectToRoute('account_store');
        }

        return $this->render('account/store_show.html.twig', [
            'store' => $store,
 
        ]);
    }
}
