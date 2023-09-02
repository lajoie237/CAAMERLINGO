<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'entrer votre nom'
                ]
            ])

            ->add('surname',null,[
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'entrer votre prénom'
                ]
            ])

            ->add('age',null,[
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'entrer votre age'
                ]
            ])

            ->add('email',EmailType::class,[
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'entrer votre email'
                ]
            ])


            ->add('password', PasswordType::class,[
                'label' =>false,
                'attr' =>[
                    'placeholder' => 'entrer votre mot de passe'
                ]
            ])
            ->add('connecter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
