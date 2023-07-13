<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('address_1', AddressType::class)
            ->add('address_2', AddressType::class)

            // // address 1
            // ->add('address_1_line_1', TextType::class)
            // ->add('address_1_line_2', TextType::class)
            // ->add('address_1_city', TextType::class)
            // ->add('address_1_zip', TextType::class)
            // ->add('address_1_country', CountryType::class)
            // // address 2
            // ->add('address_2_line_1', TextType::class)
            // ->add('address_2_line_2', TextType::class)
            // ->add('address_2_city', TextType::class)
            // ->add('address_2_zip', TextType::class)
            // ->add('address_2_country', CountryType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => User::class
        ]);
    }
}
