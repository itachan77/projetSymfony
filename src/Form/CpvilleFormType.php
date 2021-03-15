<?php

namespace App\Form;

use App\Entity\Cpville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CpvilleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('codePostal',null,array('attr'=>array('class' => 'cp form_cp','maxlenght' => 5)))

            ->add('ville',null,array('attr'=>array('class' => 'ville form_ville')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cpville::class,
        ]);
    }
}
