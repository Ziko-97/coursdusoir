<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Professeur;
use App\Entity\Absence;
use App\Entity\Seance;
use App\Entity\Eleve;
use App\Repository\MatiereRepository;
use App\Repository\EleveRepository;



use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\Date;




class NewAbsenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
            'input' => 'datetime',
            'widget' => 'single_text',
            'data' => new \DateTime()

            ])
             ->add('niveau', EntityType::class, [
                'class' => Eleve::class,
                'label' => 'Niveau', 
                'required'=> true,
                'query_builder' => function(EleveRepository $er) {
                $queryBuilder = $er->createQueryBuilder('s');
                $queryBuilder
                    ->select('s.niveau')
                    ->distinct()
                    ;
                return $queryBuilder;
            },
                 
               /* 'choice_label'=> function($eleve){
                    return $eleve->getNiveau();
                }*/
                                    

            
            ])
           /* ->add('niveau', EntityType::class, [
                'class' => Matiere::class,
                'label' => 'Niveau', 
                'required'=> true,
               'query_builder' => function(MatiereRepository $er) {
        return $er->createQueryBuilder('niveau')
            ;
    },
/*                'choice_label' => 'niveau',
*/            /*    'choice_label'=> function(Matiere $matiere){
                    return $matiere->getNiveau();
                }
                                    

            
            ])*/
            ->add('matiere', EntityType::class, [
                'class' => Matiere::class ,
                'label' => 'Matiere',
                'required' => true,
                'choice_label' => function($matiere){
                    return $matiere->getNomMatiere();
                }
            ])
           ->add('professeur',EntityType::class, [
                'class'=>Professeur::class,
                'label'=>'Nom Professeur',
                'required'=>true,
                'choice_label'=>function($professeur){
                    return $professeur->getNom();
                }
            ]) 
             
             
             
            ->add('salle',EntityType::class, [
                'class'=>Seance::class,
                'label'=>'Salle',
                'choice_label'=>function($salle){
                return $salle->getSalle();
                },
                    'mapped' => false,

            ])
            ->add('totalpresent', IntegerType::class,[
            'label' => 'Total présent',
            'disabled' => true,
            'attr' => ['value' => '32'],
            'mapped' => false,


        ])
            ->add('totalabsent', IntegerType::class,[
            'label' => 'Total absent',
            'disabled' => true,
            'mapped' => false,


        ])
          
           ->add('add',SubmitType::class,[
                'label' => 'Afficher les eleves',
                 
            ])  

            ;
             /* ->add('check', CheckboxType::class, [
    'label'    => 'Tout est présent',
    'required' => false,
    'mapped' => false,
])*/
         /*->add('token', EntityType::class, [
                 'class'=>Eleve::class,
               'empty_data' => '21',
                'required'=>true,
                'choice_label'=>function($id){
                    return $id->getIdEleve();
                }
             ])*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
            // Configure your form options here
        ]);
    }
}
