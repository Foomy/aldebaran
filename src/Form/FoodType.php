<?php

namespace App\Form;

use App\Entity\Food;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class FoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $translator = $options['translator'];

        $builder
            ->add('name', TextType::class, [
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.name.placeholder'),
                ],
                'label'      => $translator->trans('food.form.name.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('nutritionValue', IntegerType::class, [
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.nutritionValue.placeholder'),
                ],
                'label'      => $translator->trans('food.form.nutritionValue.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('protein', IntegerType::class, [
                'required'   => false,
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.protein.placeholder'),
                ],
                'label'      => $translator->trans('food.form.protein.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('fat', IntegerType::class, [
                'required'   => false,
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.fat.placeholder'),
                ],
                'label'      => $translator->trans('food.form.fat.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('roughage', IntegerType::class, [
                'required'   => false,
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.roughage.placeholder'),
                ],
                'label'      => $translator->trans('food.form.roughage.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('carbonhydrate', IntegerType::class, [
                'required'   => false,
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => $translator->trans('food.form.carbonhydrate.placeholder'),
                ],
                'label'      => $translator->trans('food.form.carbonhydrate.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('description', TextareaType::class, [
                'required'   => false,
                'attr'       => [
                    'class'       => 'form-control food-description',
                    'placeholder' => $translator->trans('food.form.description.placeholder'),
                ],
                'label'      => $translator->trans('food.form.description.label'),
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('save', SubmitType::class, [
                'attr'  => [
                    'class' => 'btn btn-success',
                ],
                'label' => $translator->trans('food.form.save.label'),
            ])
            ->add('cancel', ResetType::class, [
                'attr'  => [
                    'class'   => 'btn btn-secondary',
                    'data-js' => 'cancel-btn',
                ],
                'label' => $translator->trans('food.form.cancel.label'),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Food::class,
            'translator' => TranslatorInterface::class,
            'attr' => [
                'class' => 'food-form',
                'data-js' => 'food-form',
            ],
        ]);
    }
}
