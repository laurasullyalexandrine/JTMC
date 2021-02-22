<?php

namespace App\Controller;

use App\Entity\InformationPayment;
use App\Form\PaymentType;
use App\Repository\InformationPaymentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/payment")
 */
class InformationPaymentController extends AbstractController
{
    /**
    *List of payments 
    * 
    * @Route("/", name="payment_index", methods="GET")
    */
    public function index(InformationPaymentRepository $payment): Response
    {
        return $this->render('payment/index.html.twig', ['payment' => $payment->findAll()]);
    }

    /**
     * Create payments
     *
     * @Route("/new", name="payment_new", methods={"GET","POST"})
     * 
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $payment = new InformationPayment();

        $form = $this->createForm(PaymentType::class, $payment);
        $form->$form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $em = $this->getDoctrine()->getManager();
            $em->persist($payment);
            $em->flush();

            $this->addFlash('success', 'L\'information sur le mode de payement a été ajouter. ');

            return $this->redirectToRoute('payment_index');
        }

        return $this->render('payment/new.html.twig',
        [
            'payment' => $payment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * display of payments
     * 
     * @Route("/{id}", name="payment_read", methods="GET")
     *
     * @param Request $request
     * @return Response
     */
    public function read(InformationPayment $payment): Response
    {
        return $this->render('payment/road.html.twig', ['payment' => $payment]);
    }

    /**
     * Modify payments
     * 
     * @Route("/{id}/edit", name="payment_edit", methods={"GET","POST"})
     */

    public function edit(Request $request, InformationPayment $payment): Response
    {
        $form = $this->createForm(PaymentType::class, $payment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'l\information sur le mode de payement a été modifié.');

            return $this->redirectToRoute('payment_edit', ['id' => $payment->getId()]);
        }

        return $this->render('payment/edit.html.twig', [
            'payment' => $payment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Remove payments
     *
     * @Route("/{id}", name="payment_delete", methods="DELETE")
     * 
     * @param Request $request
     * @param InformationPayment $payment
     * @return Response
     */
    public function delete(Request $request, InformationPayment $payment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$payment->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($payment);
            $em->flush();

            $this->addFlash('success', 'L\'information sur le mode de payement a été suprimé.');

        }

        return $this->redirectToRoute('payment_index');
    }
}
