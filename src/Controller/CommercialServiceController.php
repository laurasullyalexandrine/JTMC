<?php

namespace App\Controller;

use App\Entity\CommercialService;
use App\Form\ServiceType;
use App\Repository\CommercialServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service")
 */
class CommercialServiceController extends AbstractController
{
    /**
    *List of services 
    * 
    * @Route("/", name="service_index, methods={"GET"})
    */

    public function index(CommercialServiceRepository $service): Response
    {
        return $this->render('service/index.html.twig', ['tags' => $service->findAll()]);
    }

    /**
     * Create services
     *
     * @Route("/new", name="service_new", methods={"GET", "POST"})
     * 
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $service = new CommercialService();

        $form = $this->createForm(ServiceType::class, $service);
        $form->$form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            $this->addFlash('success', 'Le service a été ajouter. ');

            return $this->redirectToRoute('service_index');
        }

        return $this->render('service/new.html.twig',
        [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * display of services
     * 
     * @Route("/{id}", name="service_read", methods={"GET"})
     *
     * @param Request $request
     * @return Response
     */
    public function read(CommercialService $service): Response
    {
        return $this->render('service/road.html.twig', ['service' => $service]);
    }

    /**
     * Modify services
     * 
     * @Route("/{id}/edit", name="service_edit", methods={"GET","POST"})
     */

    public function edit(Request $request, CommercialService $service): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'votre service a été modifié.');

            return $this->redirectToRoute('service_edit', ['id' => $service->getId()]);
        }

        return $this->render('service/edit.html.twig', [
            'tag' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Remove services
     *
     * @Route("/{id}", name="service_delete", methods={"DELETE"})
     * 
     * @param Request $request
     * @param CommercialService $service
     * @return Response
     */
    public function delete(Request $request, CommercialService $service): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();

            $this->addFlash('success', 'Le service est suprimé.');

        }

        return $this->redirectToRoute('service_index');
    }
}
