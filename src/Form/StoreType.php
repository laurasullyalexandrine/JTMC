<?php

namespace App\Form;

use App\Entity\PaymentInformation;
use App\Entity\Store;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class StoreType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('store_activity', null, [
                'label' => 'Activité du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner l\'activité de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('picture', FileType::class, [
                'label' => 'Photo du commerce',
                'mapped' => False,
                'required' => False,
                'attr' => [
                    'placeholder' => 'Veuillez insérer une image pour représenter votre commerce'
                ],
                'constraints' => [
                    new File (['maxSize' => '2M'
                    ])
                ]
            ])
            ->add('name', null, [
                'label' => 'Nom du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner le nom de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('siret', IntegerType::class, [
                'label' => 'Numéro de siret',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner le numero SIRET de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('road_number', IntegerType::class, [
                'label' => 'Numéro de rue',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner le numéro de la rue de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('address', null, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner l\'adresse de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('postal_code', IntegerType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner le code postal de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('city', null, [
                'label' => 'ville',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner la ville de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
               ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner l\'email de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner le numéro de téléphone de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('website', null, [
                'label' => 'Site web du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner l\'URL du site web de votre commerce'
                ]
            ])
                
            ->add('open_days', null, [
                'label' => 'Jours ouverture du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner les jours d\'ouvertures de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
               
            ->add('open_hours', null, [
                'label' => 'Heures ouverture du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner les heures d\'ouvertures de votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('description', null, [
                'label' => 'Description du commerce',
                'attr' => [
                    'placeholder' => 'Veuillez renseigner une description pour votre commerce'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            
            ])
            ->add('submit', SubmitType::class,[
                'label'=>"Valider",
            ])
        ;
    }
}