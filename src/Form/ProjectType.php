<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Technos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('githubLink')
            ->add('dateStart', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('image', FileType::class)
            ->add('technos', EntityType::class, [
                // looks for choices from this entity
                'class' => Technos::class,
                'choice_label' => 'name',
                'multiple' => true,
                "attr" => [
                    "class" => "ui dropdown"
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
