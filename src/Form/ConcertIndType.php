<?php

namespace App\Form;

use App\Form\ImgCiType;
use App\Entity\ConcertInd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ConcertIndType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreConcertInd')
            ->add('comConcertInd')
            //->add('imgCi')
            
            ->add('imgTmpConcertInd',FileType::class,['required'=>false, 'data_class'=>null,
            'empty_data'=>'aucune image'])
            ;

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ConcertInd::class,
        ]);
    }
}
