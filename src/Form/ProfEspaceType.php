<?php

namespace App\Form;

use App\Form\UserModType;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProfEspaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('photoProf',FileType::class,['label'=>'Changer la photo du professeur :', 'required'=>false, 'data_class'=>null,
        'empty_data'=>'aucune image'])
            //->add('emailProf')
            ->add('descriptionProf',CKEditorType::class,[
                'config' => [
                    'uiColor' => '#e2e2e2',
                    'toolbar' => 'full',
                    'required' => true
                ]
            ])
            ->add('user',UserModType::class)

            //->add('user')
            //->add('fichiers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
