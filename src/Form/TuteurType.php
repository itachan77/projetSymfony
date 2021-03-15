<?php

namespace App\Form;


use App\Entity\Tuteur;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;






class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomTuteur',TextType::class,['label'=>'Nom:', 'required'=>false])
            ->add('prenomTuteur',TextType::class,['label'=>'Prénom:', 'required'=>false])
            ->add('adresseTuteur',TextType::class,['label'=>'Adresse:', 'required'=>false])
            ->add('tel1Tuteur',TextType::class,['label'=>'Tél1:', 'required'=>false])
            ->add('tel2Tuteur',TextType::class,['label'=>'Tél2:', 'required'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tuteur::class,
        ]);
    }
}
