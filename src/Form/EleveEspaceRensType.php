<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EleveEspaceRensType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('photoEleve',FileType::class,['label'=>'Changer votre photo :', 'required'=>false, 'data_class'=>null,
            'empty_data'=>'aucune image'])
            ->add('nomEleve')
            ->add('prenomEleve')

            ->add('naissanceEleve', DateType::class, [
                'widget' => 'single_text',
                ])

            ->add('adresseEleve')
            ->add('cpville')
            ->add('tel1Eleve')
            ->add('tel2Eleve')
            ->add('tel3Eleve')
            ->add('tel4Eleve')
            
            ->add('emailEleve')
            /*
            ->add('nomConnuPar')
            ->add('infoI')
            ->add('tuteur')
            */

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
