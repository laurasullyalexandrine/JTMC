<?php

namespace App\Controller;

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
     * @Route("/account/stores", name="account_store")
     */
    public function index(): Response
    {
        return $this->render('account/store.html.twig');
    }

    /**
     * @Route("/account/add-store", name="account_store_add")
     */
    public function add(Request $request, FileUploader $fileUploader ): Response
    {
        $store = new Store();

        $form = $this->createForm(StoreType::class, $store);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $store->setUser($this->getUser());
            $this->entityManager->persist($store);

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
     * @Route("/account/edit-store/{id}", name="account_store_edit")
    */
    public function edit(Request $request, $id, FileUploader $fileUploader): Response
    {
        $store = $this->entityManager->getRepository(Store::class)->findOneById($id);
     

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
     * @Route("/account/delete-store/{id}", name="account_store_delete")
    */
    public function delete($id): Response
    {
        $store = $this->entityManager->getRepository(Store::class)->findOneById($id);

        if ($store && $store->getUser() == $this->getUser()) {
            $this->entityManager->remove($store);
            $this->entityManager->flush();
        }

            return $this->redirectToRoute('account_store');
    }

    /**
     * @Route("/account/show-store/{id}", name="account_store_show")
    */
    public function read($id): Response
    {
        $store = $this->entityManager->getRepository(Store::class)->findOneById($id);

        if (!$store || $store->getUser() != $this->getUser()) {
            return $this->redirectToRoute('account_store');
        }

        return $this->render('account/store_show.html.twig', [
            'store' => $store
        ]);
    }
}
