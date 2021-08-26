<?php

namespace App\Form;

use Attribute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('term',SearchType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=>'searchText',
                    'placeholder'=>'Votre recherche ici'
                ]
            ])
            -
            ->add('Rechercher',SubmitType::class,[
                'attr'=>[
                    'class'=>'main-button btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
