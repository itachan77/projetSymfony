<?php

namespace App\Form;

use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ProfAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('nomProf')
            ->add('prenomProf')
            ->add('photoProf',FileType::class,['label'=>'Changer la photo du professeur :', 'required'=>false, 'data_class'=>null,
            'empty_data'=>'aucune image'])
            ->add('emailProf')

            /*
        ->add('eleves', EntityType::class, [
            'class'=> Eleve::class,
            'label'=>'Ses élèves : ',
            'multiple'=>true,
            'required'=>false
        ])*/
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }

}
