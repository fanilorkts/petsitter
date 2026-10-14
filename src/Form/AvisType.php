<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Avis;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
            ->add('commentaire')
            ->add('date')
            ->add('id_annonce', EntityType::class, [
                'class' => Annonces::class,
                'choice_label' => 'id',
            ])
            ->add('id_auteur', EntityType::class, [
                'class' => Utilisateurs::class,
                'choice_label' => 'id',
            ])
            ->add('id_cible', EntityType::class, [
                'class' => Utilisateurs::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
