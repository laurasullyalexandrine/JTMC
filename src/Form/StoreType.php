<?php
​
namespace App\Form;
​
use App\Entity\CommercialService;
use App\Entity\InformationPayment;
use App\Entity\Store;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiseType;
​
class StoreType extends AbstractType {
​
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('store_activity', ChoiceType::class, [
                'choices'=>[
                    'Boulangerie'=>'boulangerie',
                    'Boucherie/Charcuterie'=>'boucherie-charcuterie',
                    'Café-bar/Tabac'=>'cafe-bar-tabac',
                    'Coiffeur'=>'coiffeur',
                    'Epicerie'=>'epicerie',
                    'Fromagerie'=>'fromagerie',
                    'Librairie/Press'=>'librairie-presse',
                    'Pharmacie'=>'pharmacie',
                    'Fleuriste'=>'fleuriste',
                    'Restaurant'=>'restaurant',
                    'Autre'=>'autre',
                ],
                'label' => 'Activité du commerce',
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('picture', FileType::class, [
                'label' => 'Photo du commerce',
                'mapped' => False,
                'required' => False,
                'constraints' => [
                    new File (['maxSize' => '2M'
                    ])
                ]
            ])
            ->add('name', null, [
                'label' => 'Nom du commerce',
                'attr' => [
                    'placeholder' => 'Ex: O\'fleurs',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('siret', IntegerType::class, [
                'label' => 'Numéro de siret',
                'attr' => [
                    'placeholder' => 'Ex: 159357651 48562',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('road_number', IntegerType::class, [
                'label' => 'Numéro de rue',
                'attr' => [
                    'placeholder' => 'Ex: 352',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('address', null, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Ex: Rue des lilas',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('postal_code', IntegerType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Ex: 60700'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('city', null, [
                'label' => 'ville',
                'attr' => [
                    'placeholder' => 'Ex: Pont Sainte-Maxence'
                ],
                'constraints' => [
                    new NotBlank,
               ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Ex: ofleur@gmail.com',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone du commerce',
                'attr' => [
                    'placeholder' => 'Ex: 0344531894',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('website', null, [
                'label' => 'Site web du commerce',
                'attr' => [
                    'placeholder' => 'Ex: www.ofleur.com'
                ]
            ])
                
            ->add('open_days', null, [
                'label' => 'Jours ouverture du commerce',
                'attr' => [
                    'placeholder' => 'Ex: '
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
               
            ->add('open_hours', null, [
                'label' => 'Heures ouverture du commerce',
                'attr' => [
                    'placeholder' => 'Ex: 9h00 - 18h30',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('description', null, [
                'label' => 'Description du commerce',
                'attr' => [
                    'placeholder' => 'Décrivez les spécialités de votre commerce',
                ],
                'constraints' => [
                    new NotBlank,
                ],            
            ])
​
            ->add('InformationPayment', EntityType::class, [
                'expanded' => true,
                'multiple' => true,
                'class' => InformationPayment::class
            ])
​
            ->add('CommercialService', EntityType::class, [
                'expanded' => true,
                'multiple' => true,
                'class' => CommercialService::class
            ])
​
            ->add('submit', SubmitType::class,[
                'label'=>"Valider",
            ]);
    }
