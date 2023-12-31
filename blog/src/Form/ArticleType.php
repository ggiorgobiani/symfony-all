<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre de l'article",
                'constraints' => [
                    new NotBlank([
                        'message' => "Le titre de l'article est obligatoire"
                    ])
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => "Contenu de l'article",
                'constraints' => [
                    new NotBlank([
                        'message' => "Le contenu de l'article est obligatoire"
                    ])
                ]
            ])
            ->add('illustration', FileType::class, [
                'constraints' => [
                    new File([
                        'maxSize' => "1024k",
                        'maxSizeMessage' => "Le fichier est trop lourd. ({{ limit }} max)",
                        'mimeTypes' => [
                            "image/gif",
                            "image/jpeg",
                            "image/png",
                        ],
                        'mimeTypesMessage' => "Le format de fichier n'est pas autorisé"
                    ])
                ]
            ])

            // Categories Collection
            ->add('categories', CollectionType::class, [
                'entry_type' => EntityType::class,
                'entry_options' => [
                    'class' => Category::class,
                    'choice_label' => 'name'
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
