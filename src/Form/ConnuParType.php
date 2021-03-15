<?php

namespace App\Form;

use App\Entity\ConnuPar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConnuParType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomConnuPar',ChoiceType::class, [
                'choices' => [
                    'Tract'=>'Tract',
                    'Internet'=>'Internet',
                    'Connaissance'=>'Connaissance']
            ])

            ->add('autreConnuPar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ConnuPar::class,
        ]);
    }
}
