<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom', null, ['label' => 'Prénom'])
            ->add('numEtudiant', null, ['label' => 'N° Etudiant'])
            ->add('birthday', null, ['label' => 'Date de naissance', 'years' => range(1970, date('Y'))])
            ->add('adressePostal', null, ['label' => 'Adresse postale'])
            ->add('telephone', null, ['label' => 'N° Tel'])
            ->add('portable', null, ['label' => 'N° Portable'])
            ->add('email')
            ->add('adresse', TextareaType::class, ['label' => 'Adresse'])
            ->add('regimespecialetude',ChoiceType::class, [
                'required' => true,
                'label' => 'Régime Spécial d\'étude',
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Non' => 'Non',
                  'Oui' => 'Oui',
                  
                ],
            ])
            ->add('typecontrole',ChoiceType::class, [
                'required' => true,
                'label' => 'Type de contrôle choisi (Si Régime Spécial d\'étude est en "OUI") ',
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'TERMINAL UNIQUEMENT' => 'TERMINAL UNIQUEMENT',
                  'Autre' => 'Autre',
                  
                ],
            ])
            ->add('autretypecontrole', TextareaType::class, [ 'label' => 'Autre Type contrôle (Si Type de contrôle choisi est en "Autre") ', 'mapped' => false, 'required' => false])
            ->add('redoublant',ChoiceType::class, [
                'required' => true,
                'label' => 'Redoublant L3 ou AJAC L2/L3',
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Oui' => 'Oui',
                  'Non' => 'Non',
                ],
            ])
            ->add('semestreobtenu', NumberType::class, ['label' => 'Semestres déjà obtenus en L3'])
            ->add('demandetemps',ChoiceType::class, [
                'required' => true,
                'label' => 'Demande de 1/3 temps',
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Oui' => 'Oui',
                  'Non' => 'Non',
                ],
            ])
            ->add('parcours',ChoiceType::class, [
                'required' => true,
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Choisir' => '',
                  'MIAGE' => 'MIAGE',
                  'INGENIERIE INFORMATIQUE' => 'INGENIERIE INFORMATIQUE',
                ],
            ])
            ->add('semestre', ChoiceType::class, [
                'required' => true,
                'mapped' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                  'Choisir' => '',
                  '5' => '5',
                  '6' => '6',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            'allow_extra_fields' => true
        ]);
    }
}
