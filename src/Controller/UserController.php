<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UserEditType;
use App\form\UserType;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FileUpload;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/storekeeper")
 */

class UserController extends AbstractController
{

    /**
     * @Route("/register", name="storekeeper_register")
     */
     public function register(Request $request, UserPasswordEncoderInterface $encoder, RoleRepository $roleRepository)
     {
        $user = new User();
        
        $form = $this->createForm(RegisterType::class, $user);
        $form= $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $role = $roleRepository->findOneByRolesString('ROLE_USER');
            $user->setRole($role);

            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success','Vous êtes enregistré ! Vous pouvez maintenant vous connecter.');
            return $this->redirectToRoute('login');
        }

        return $this->render('user/register.html.twig', [
            'form'=> $form->createView(),
        ]);
     }

     /**
      * @Route("/profile", name="storekeeper_profile")
      */
     public function profile()
     {
        $user= $this->getUser();
        return $this->render('user/profile.html.twig', [
            'user'=>$user,
        ]);
     }

     /**
      * @Route("/edit", name="storekeeper_edit")
      */
    public function edit(Request $request, FileUpload $fileUpload)
    {
        $user = $this->getUser();
        
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Profil modifié.');

            return $this->redirectToRoute('user_profile');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
//continuer a coder avec faqOclock -> editPassword

}