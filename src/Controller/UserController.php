<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UserEditType;
use App\form\UserType;
use App\Form\UserPasswordType;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
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
     * Register a user
     *
     * @Route("/register", name="storekeeper_register")
     * 
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param RoleRepository $roleRepository
     * @return void
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

        return $this->render('user/register.html.twig',
        [
            'form'=> $form->createView(),
        ]);
     }

     /**
      * Display profile
      *
      * @Route("/profile", name="storekeeper_profile")
      *
      * @return void
      */
     public function profile()
     {
        $user= $this->getUser();
        return $this->render('user/profile.html.twig',
        [
            'user'=>$user,
        ]);
     }

     /**
      * Modify the profile
      *
      *@Route("/edit", name="storekeeper_edit")
      *
      * @param Request $request
      * @param FileUpload $fileUpload
      * @return void
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

            $this->addFlash('success', 'Votre profil est modifié.');

            return $this->redirectToRoute('storekeeper_profile');
        }

        return $this->render('user/edit.html.twig',
        [
            'form' => $form->createView(),
        ]);
    } 

    /**
     * Change the password
     * 
     * @Route("/edit/password", name="storekeeper_editPassword"
     *
     * @param Request $request
     * @return void
     */
    public function editPassword(Request $request UserPasswordEncoderInterface $encoder)
    {
        $user = $this->getUser();

        $form = $this->createForm(UserPasswordType::class $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && form->isValid()){
            $user-SetPassword($encoder->encodePassword($user, $user->getPassword()));

            $em = $this-getDoctrine()->getManager();
            $em->flush();

            $this->addFlash ('success', 'Votre mot de passe est modifié');

            return $this->redirectToRoute('storekeeper_profile');
        }
        
        return $this->render('user/editPassword.html.twig',
        [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * Show adminitrator
     * 
     * @@Route("/admin/user", name="admin_user", methods="GET")
     *
     * @param UserRepository $userRepository
     * @return void
     */
    public function admin(UserRepository $userRepository)
    {
        return $this->render('user/admin.html.twig', [
            'users' => $userRepository->findAll()
        ]);
    }

    /**
     * Modify user
     * 
     * @Route("/admin/user/moderate/{id}", name="admin_user_moderate", methods="GET|POST")
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function moderate(Request $request, User $user)
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'L\'utilisateur est modifié.');

            return $this->redirectToRoute('admin_user_moderate', ['id' => $user->getId()]);
        }

        return $this->render('user/moderate.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}