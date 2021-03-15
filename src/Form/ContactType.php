<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titreContact',ChoiceType::class, [
                'choices' => [
                    'Monsieur'=>'Monsieur',
                    'Madame'=>'Madame',
                    'Mademoiselle'=>'Mademoiselle',
                    ]

            ])

            ->add('nomContact')
            ->add('prenomContact')


            ->add('ageContact',ChoiceType::class, [
                'choices' => [
                    'Moins de 20 ans'=>'Moins de 20 ans',
                    'Entre 20 et 39 ans'=>'Entre 20 et 39 ans',
                    '40 ans et plus'=>'40 ans et plus',
                    ]

            ])

            
            ->add('emailContact',EmailType::class)
            ->add('messageContact')
            ->add('telephone', TelType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
