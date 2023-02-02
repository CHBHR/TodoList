<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('hasDeadLine', CheckboxType::class,
                [
                    'label' => "Ajouter une 'dead-line' ?",
                    'required' => false,
                ])
            ->add('deadLine', DateType::class,
                [
                    'label' => "Date limite",
                    'required' => false,
                    'data'   => new \DateTime(),
                    'attr'  => ['min' => ( new \DateTime() )->format('d-m-Y')]
                ])
        ;
    }
}
