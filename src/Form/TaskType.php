<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Message;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DataTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\Validator\Constraints\Type;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title',TextType::class, [
            'label' => 'Title',
            'attr'=> ['placeholder'=> 'Scrie un titlu',
            'class'=> 'Task',
            'id'=> 'title',],
            'constraints'=>[
                new Length(
                    min:4,
                    max:20,
                    minMessage: 'Titlul trebuie sa fie de cel putin {{ limit }} caractere',
                    maxMessage: 'Titlul nu  poate fi mai lung de {{ limit }} caractere',

                ),
                    new Regex(
                  pattern:'/[A-Za-zâîășț]/',
                  message:'Introdu doar litere',
                    ),
                new NotNull(),
            ]
            ])
            ->add('description',TextType::class, [
                'label' => 'Description',
                'attr'=> ['placeholder'=> 'Scrie o descriere',
                'class'=> 'Task',
                'id'=> 'description',],
                'constraints'=>[
                    new Length(
                        min:4,
                        max:20,
                        minMessage: 'Descrierea trebuie sa fie de cel putin {{ limit }} caractere',
                        maxMessage: 'Descrierea nu  poate fi mai lung de {{ limit }} caractere',
    
                    ),
                        new Regex(
                      pattern:'/[A-Za-zâîășț]/',
                      message:'Introdu doar litere',
                        ),
                    new NotNull(),
                ]
                ])
            ->add('dueDate')
            ->add('createdAt')
            ->add('category', EntityType::class, [
                'class' => Category::class, // Clasa entității specialitate
                'choice_label' => 'title',
                'label' => 'Category',
                'placeholder' => 'Choose category',
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],

            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
