<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { //  If form is submitted and valided

            // I tell him to fill in the fields of user entity with the fields entered in the form
            $user = $form->getData();

            // Before saving the user I want to hashed the password that comes from the user entity.
            $password = $encoder->encodePassword($user,$user->getPassword());

            // Change the password and instead I put the one I just hached
            $user->setPassword($password);

            // I tell him to keep it in memory
            $this->entityManager->persist($user);

            // and save it in the database
            $this->entityManager->flush();

            $this->addFlash('succes', 'Votre compte a bien été créé, Vous pouvez dès à présent vous connecter !');

            return $this->redirectToRoute('app_login');
            
        }


        return $this->render('register/index.html.twig', [
            'form' =>$form->createView()
        ]);
    }
}
