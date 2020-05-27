<?php

namespace App\Form;

use App\Entity\Projects;
use App\Entity\WebSkill;
use App\Entity\TechnicalSkill;
use App\Form\WebSkillType;
use App\Form\TechnicalSkillType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('videoLink')
            ->add('description')
            ->add('technosUse', EntityType::class, array(
                'class' => WebSkill::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,))
            ->add('skillUse', EntityType::class, array(
                'class' => TechnicalSkill::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,))
            ->add('website')
            ->add('Modifier', submitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
