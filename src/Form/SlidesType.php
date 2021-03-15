<?php

namespace App\Form;

use App\Entity\Slides;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class SlidesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('fichierSlide',FileType::class,['label'=>'Ajoutez une image', 'required'=>false, 'data_class'=>null,
        'empty_data'=>'aucune image'])
        ;
    }

    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Slides::class,
        ]);
    }
}
