<?php

namespace App\Form;

use App\Entity\CommercialService;
use App\Entity\InformationPayment;
use App\Entity\OpenDays;
use App\Entity\Store;
use App\Service\Geoloc;
use App\Enum\ShopTypeEnum;
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
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class StoreType extends AbstractType {

    private $geoloc;
    public function __construct(Geoloc $geoloc){
        $this->geoloc = $geoloc;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::PRE_SUBMIT,[$this,"onPreSubmit"])
            ->add('store_activity', ChoiceType::class, [
                'choices'=>[
                    'Boucherie/Charcuterie'=>'boucherie-charcuterie',
                    'Boulangerie'=>'boulangerie',
                    'Café-bar/Tabac'=>'cafe-bar-tabac',
                    'Coiffeur'=>'coiffeur',
                    'Epicerie'=>'epicerie',
                    'Fleuriste'=>'fleuriste',
                    'Librairie/Press'=>'librairie-presse',
                    'Pharmacie'=>'pharmacie',
                    'Restaurant'=>'restaurant',
                    'Autre'=>'autre',
                ],
                'label' => 'Activité du commerce : ',
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('picture', FileType::class, [
                'label' => 'Photo de votre commerce :',
                'mapped' => False,
                'required' => False,
                'constraints' => [
                    new File (['maxSize' => '2M'
                    ])
                ]
            ])
            ->add('name', null, [
                'label' => 'Nom de votre commerce :',
                'attr' => [
                    'placeholder' => 'Ex: O\'fleurs',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('siret', IntegerType::class, [
                'label' => 'Numéro de siret :',
                'attr' => [
                    'placeholder' => 'Ex: 159357651 48562',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('road_number', IntegerType::class, [
                'label' => 'Numéro de rue :             ',
                'attr' => [
                    'placeholder' => 'Ex: 352',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('address', null, [
                'label' => 'Nom de rue :',
                'attr' => [
                    'placeholder' => 'Ex: Rue des lilas',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('postal_code', IntegerType::class, [
                'label' => 'Code postal :',
                'attr' => [
                    'placeholder' => 'Ex: 60700'
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('city', null, [
                'label' => 'Ville : ',
                'attr' => [
                    'placeholder' => 'Ex: Pont Sainte-Maxence'
                ],
                'constraints' => [
                    new NotBlank,
               ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'email :',
                'attr' => [
                    'placeholder' => 'Ex: ofleur@gmail.com',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone :',
                'attr' => [
                    'placeholder' => 'Ex: 0344531894',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            ->add('website', null, [
                'label' => 'Site web :',
                'attr' => [
                    'placeholder' => 'Ex: www.ofleur.com'
                ]
            ])
                
            ->add('getOpenDays', EntityType::class, [
                'label' => 'Jours d\'ouverture :',
                'expanded' => true,
                'multiple' => true,
                'class' => OpenDays::class
            ])
               
            ->add('open_hours', null, [
                'label' => 'Horaires d\'ouverture :',
                'attr' => [
                    'placeholder' => 'Ex: 9h00 - 18h30',
                ],
                'constraints' => [
                    new NotBlank,
                ],
            ])
            
            ->add('InformationPayment', EntityType::class, [
                'label' => 'Mode de paiement accepté :',
                'attr' => [
                    'placeholder' => 'Carte bancaire, ticket restaurant etc...',
                ],
                'expanded' => true,
                'multiple' => true,
                'class' => InformationPayment::class
            ])

            ->add('CommercialService', EntityType::class, [
                'label' => 'Service commercial :',
                'attr' => [
                    'placeholder' => 'Too good to go, relais colis etc...',
                ],
                'expanded' => true,
                'multiple' => true,
                'class' => CommercialService::class
            ])

            ->add('description', null, [
                'label' => 'Description de votre activité :',
                'attr' => [
                    'placeholder' => 'Décrivez les spécialités de votre commerce',
                ],
                'constraints' => [
                    new NotBlank,
                ],            
            ])

            // ->add('submit', SubmitType::class,[
            //     'label'=>"Valider",
            // ])
        ;
    }
    
    public function onPreSubmit(FormEvent $event){
        $form = $event->getForm();
        $data = $event->getData();
        $coordinates = $this->geoloc->getCoordinates($data);

        $form->add('latitude',null);
        $data['latitude'] = $coordinates['lat'];
        $form->add('longitude',null);
        $data['longitude'] = $coordinates['long'];
        $data['city'] = $coordinates['city'];
        $data['address'] = $coordinates['street'];
        
        $event->setData($data);
    }
}