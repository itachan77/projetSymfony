<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserModType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        
        ->add('password', RepeatedType::class, [
            'type'=>PasswordType::class,
            'required'=>true,
            'first_options'=>['label'=>'Mot de passe'],
            'second_options'=>['label'=>'Confirmation du Mot de passe'],
            'attr'=>['class'=>'form-control'],
            
        ])

        ->add('username',TextType::class, [
        'attr' => [
            'id'=>'monid',
        ]
        ])
        
    ;

    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
