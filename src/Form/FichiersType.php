<?php

namespace App\Form;

use App\Entity\Fichiers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FichiersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreFichier',TextType::class,['label'=>'Titre du fichier'])
            ->add('descrFichier',TextareaType::class,['label'=>'Description du fichier'])
            ->add('fichier',FileType::class,['label'=>'Fichier', 'required'=>false, 'data_class'=>null,
            'empty_data'=>'Aucun fichier'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fichiers::class,
        ]);
    }
}
