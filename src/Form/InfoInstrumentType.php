<?php

namespace App\Form;

use App\Entity\InfoInstrument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class InfoInstrumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('havemusic')
            ->add('whathavemusic',TextType::class,['label'=>'', 'required'=>false, 'attr' => ['placeholder' => 'Si oui lesquels ?']])
            ->add('doinstrument')
            ->add('whatdoinstrument',TextType::class,['label'=>'', 'required'=>false, 'attr' => ['placeholder' => 'Si oui lesquels ?']])
            ->add('haveinstrument')
            ->add('whathaveinstrument',TextType::class,['label'=>'', 'required'=>false, 'attr' => ['placeholder' => 'Si oui lequel ?']])
            
        ;

        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoInstrument::class,
        ]);
    }
}
