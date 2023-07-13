<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\UlidType;
use Symfony\Component\Form\Extension\Core\Type\UuidType;
use Symfony\Component\Form\Extension\Core\Type\WeekType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('text', TextType::class, [
                'label' => "Mon champ"
            ])
            ->add('textarea', TextareaType::class)
            ->add('EmailType', EmailType::class)
            ->add('IntegerType', IntegerType::class)
            ->add('MoneyType', MoneyType::class)
            ->add('NumberType', NumberType::class)
            ->add('PasswordType', PasswordType::class)
            ->add('PercentType', PercentType::class)
            ->add('SearchType', SearchType::class)
            ->add('UrlType', UrlType::class)
            ->add('RangeType', RangeType::class)
            ->add('TelType', TelType::class)
            ->add('ColorType', ColorType::class)

            ->add('ChoiceType_1', ChoiceType::class, [
                'choices' => [
                    'Yes' => "yes",
                    'No' => "no"
                ]
            ])
            ->add('ChoiceType_2', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'Yes' => "yes",
                    'No' => "no"
                ]
            ])
            ->add('ChoiceType_3', ChoiceType::class, [
                'expanded' => true,
                'choices' => [
                    'Yes' => "yes",
                    'No' => "no"
                ]
            ])
            ->add('ChoiceType_4', ChoiceType::class, [
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Yes' => "yes",
                    'No' => "no"
                ]
            ])

            // ->add('EnumType', EnumType::class)
            // ->add('EntityType', EntityType::class)
            ->add('CountryType', CountryType::class)
            ->add('LanguageType', LanguageType::class)
            ->add('LocaleType', LocaleType::class)
            ->add('TimezoneType', TimezoneType::class)
            ->add('CurrencyType', CurrencyType::class, [
                'choice_loader' => null,
                'choices' => [
                    'EUR' => 'EUR', 
                    'GBP' => 'GBP', 
                    'USD' => 'USD'
                ],
            ])

            ->add('DateType', DateType::class, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('DateIntervalType', DateIntervalType::class)
            ->add('DateTimeType', DateTimeType::class)
            ->add('TimeType', TimeType::class)
            ->add('BirthdayType', BirthdayType::class, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('WeekType', WeekType::class)

            ->add('CheckboxType', CheckboxType::class)
            ->add('FileType', FileType::class)
            ->add('RadioType', RadioType::class)

            // ->add('CropperType', CropperType::class)
            // ->add('DropzoneType', DropzoneType::class)
            ->add('UuidType', UuidType::class)
            // ->add('UlidType', UlidType::class)
            // ->add('CollectionType', CollectionType::class)
            ->add('RepeatedType', RepeatedType::class, [
                'type' => CountryType::class,
                'first_options'  => ['label' => 'Pays 1'],
                'second_options' => ['label' => 'Pays 2'],
            ])
            ->add('HiddenType', HiddenType::class)
            
            ->add('ButtonType', ButtonType::class)
            ->add('ResetType', ResetType::class)
            ->add('SubmitType', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
