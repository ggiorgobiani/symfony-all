<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('score_a')
            ->add('score_b')
            ->add('team_a', EntityType::class, [
                // Definition de l'entité
                'class'=>Team::class, 
                'choice_label' => "name"               
            ])
            ->add('team_b', EntityType::class, [
                // Definition de l'entité pour pouvoir genere le string
                'class'=>Team::class,  
                'choice_label' => "name"              
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
