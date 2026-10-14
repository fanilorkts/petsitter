<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Candidatures;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message')
            ->add('statut')
            ->add('date_candidature')
            ->add('id_annonce', EntityType::class, [
                'class' => Annonces::class,
                'choice_label' => 'id',
            ])
            ->add('id_gardien', EntityType::class, [
                'class' => Utilisateurs::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidatures::class,
        ]);
    }
}
