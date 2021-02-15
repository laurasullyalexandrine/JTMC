<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class StoreType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('store_activity', null, [
                'label' => 'Activité du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('picture', FileType::class, [
                'label' => 'Photo du commerce',
                'mapped' => False,
                'requied' => False,
                'constraint' => [
                    new file (['maxsize' => '2M'
                    ])
                ]
            ])
            ->add('name', null, [
                'label' => 'Nom du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('siret', IntegerType::class, [
                'label' => 'Numéro de siret du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('address', null, [
                'label' => 'Adresse du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('postal_code', IntegerType::class, [
                'label' => 'Code postal du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('website', null, [
                'label' => 'Site web du commerce',
            ])
                // A vérifier
            ->add('open_days', [
                'label' => 'Jours ouverture du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
                // A vérifier
            ->add('open_hours', [
                'label' => 'Heures ouverture du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('description', null, [
                'label' => 'Description du commerce',
                'constraints' => [
                    new NotBlank()
                ]
            ])
        ;
    }
}