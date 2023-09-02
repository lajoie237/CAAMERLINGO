<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function login(): Response
    {
        $age=12;
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
            'tt'=>$age
        ]);
    }
    #[Route('/signup', name: 'app_signup')]
    public function signup(Request $request,EntityManagerInterface $manager,UserPasswordHasherInterface $passwordHasher): Response
    {
        $user=new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user= $form->getData();
            $plaintextPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword($user,$plaintextPassword);
            $user->setPassword($hashedPassword);
            $manager->persist($user);
            $manager->flush();
        }

      return $this->render('auth/signup.html.twig',[
        'form'=> $form->createView()
      ]);
    }
}
