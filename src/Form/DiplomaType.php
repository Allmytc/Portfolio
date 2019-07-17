<?php

namespace App\Form;

use App\Entity\Diploma;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('niveau')
            ->add('logo')
            ->add('school')
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diploma::class,
        ]);
    }
}
