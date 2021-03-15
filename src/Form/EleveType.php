<?php

namespace App\Form;

use DateTime;
use App\Entity\Eleve;

use App\Form\TuteurType;
use App\Entity\Categorie;
use App\Form\ConnuParType;


use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\ChoiceFilterType;


class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('dinscriptionEleve', DateType::class, [
                'widget' => 'single_text',
                ])

            ->add('nomEleve',TextType::class,['label'=>'Nom:'])
            ->add('prenomEleve',TextType::class,['label'=>'Prenom:'])
            ->add('naissanceEleve',TextType::class,['label'=>'Date de naissance:', 'required'=>false])
            ->add('adresseEleve',TextType::class,['label'=>'Adresse:'])
            
            ->add('tel1Eleve',TextType::class,['label'=>'Téléphone 1:', 'required'=>false])
            ->add('tel2Eleve',TextType::class,['label'=>'Téléphone 2:', 'required'=>false])
            ->add('tel3Eleve',TextType::class,['label'=>'Téléphone 3:', 'required'=>false])
            ->add('tel4Eleve',TextType::class,['label'=>'Téléphone 4:', 'required'=>false])
            ->add('emailEleve',TextType::class,['label'=>'Email:'])
            ->add('informationEleve')
            ->add('photoEleve',FileType::class,['label'=>'Nom de l\'image:', 'required'=>false, 'data_class'=>null,
            'empty_data'=>'aucune image'])

            ->add('InfoI',InfoInstrumentType::class, array(
                'label'=>'Infos sur l\'instrument de l\'élève',
                'required'=>false
            ))

            ->add('Tuteur',TuteurType::class, array(
                'label'=>'Tuteur de l\'élève',
                'required'=>false
            ))

        //TRES TRES TRES important 
        //symfony crée lui-meme un select option multiple avec surtout gestion du add mais à condition 
        //d'avoir créé un __toString dans l'entité étrangère :
            // public function __toString() 
            // {
            //     return $this->nomProf.' '.$this->prenomProf;
            // }
        ->add('Category')
        ->add('professeur')
        
        ->add('nomConnuPar',ConnuParType::class, array(
            'label'=>'Connu par :',
            
        ))

            ->add('cpville',TextType::class)
//            ->add('selectEleve', CheckboxType::class,)

            // ->add('categorie',CategorieType::class,);

            // ->add('categorie',EntityType::class, array(
            //     'class'=>Categorie::class,

            
                


            // ->add('categories',EntityType::class, array(
            //     'class'=>Categorie::class,
            //     'choice_label'=>'Nom de la Catégorie',
            //     'label'=>'Sélectionnez la catégorie',
            //     'multiple'=>false,
            //     'required'=>false
            // ))


            // ->add('categorie',ChoiceType::class, [
            //     'choices' => [
            //         'Piano'=>'1',
            //         'Violon'=>'2',
            //         'Chant'=>'3',
            //         'Eveil musical'=>'4',
            //         'Saxophone'=>'5',
            //         'Guitare'=>'6',
                    
            //         ]

            // ])

            
            // ->add('cpville',ChoiceFilterType::class, [
            //     //'attr'=>array('id' => 'vil'),
            //     'choices' => [
            //         ''=>'',
            //         ]

            // ])


        //     ->add('maxMoisFiscal', ChoiceType::class,
        //     [
        //        'choices'  =>
        //        [
        //            '1' => true,
        //            '2' => true,
        //            '3' => true,
        //        ],
        //        'multiple'=>true,
        //        'expanded'=>true,

        //    ]);
            

            // ->add('categorie',CategorieRepository::class, array(
            //         'multiple'=>true,
            //    ))

            // ->add('datecreationEleve',DateTime::class,['label'=>'Date de création:'])
            //->add('categorie')
            // ->add('nomConnuPar',TextType::class,['label'=>'Connu par:'])
            
            //->add('tuteur')
            
        ;
    }







    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
