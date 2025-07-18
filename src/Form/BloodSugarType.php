<?php

namespace App\Form;

use App\Entity\BloodSugarMeasurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BloodSugarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('measurementTime', null, [])
            ->add('bloodSugarValue', NumberType::class, [
                'attr' => [
                    'int' => true,
                    'placeholder' => 'Blutzuckerwert', // @todo Translate placeholder value!
                    'data-js' => 'bsvField',
                ]
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                    'data-js' => 'save',
                ]
            ])
            ->add('cancel', ResetType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary',
                    'data-js' => 'cancel',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BloodSugarMeasurement::class,
        ]);
    }
}
