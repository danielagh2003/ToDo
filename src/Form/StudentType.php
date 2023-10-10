<?php

namespace App\Form;

use App\Entity\Specialitate;
use App\Entity\Student;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DataTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\VarDumper\Cloner\Data;


class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeStudent',TextType::class, [
            'label' => 'Username',
            'attr'=> ['placeholder'=> 'Type your name',
            'class'=> 'Student',
            'id'=> 'name',],
            'constraints'=>[
                new Length(
                    min:5,
                    max:30,
                    minMessage: 'Your first name must be at least {{ limit }} characters long',
                    maxMessage: 'Your first name cannot be longer than {{ limit }} characters',

                ),
                    new Regex(
                  pattern:'/[A-Za-zâîășț]/',
                  message:'Introdu doar litere',
                    ),
                new NotNull(),
            ]
            ])
            ->add('mediaStudent',NumberType::class,
            [
            'constraints'=>[
            new Regex(
                pattern:'/^(10|\d{1}(.\d})?)$/',
                message:'Introdu doar cifre de la 1 pana la 10',
                  ),
              new NotNull(),
          ]
            ])
            ->add('BirthDate', DateType::class, [
                'constraints' => [
                    new Date(
                        message: 'Introdu data ta de nastere',
                    ),
                ],
                // Alte opțiuni pentru configurarea câmpului DateType
            ])
        
            ->add('Grupa')
            ->add('specialitate', EntityType::class,[
                'class'=> Specialitate::class, //clasa entitatii specialitate
                'choice_label' => 'denumire',
                'label'=> 'Specialitate',
                'placeholder'=> 'choice specialitate',
                'constraints'=>[
                new Type(Specialitate::class,
                message:'Introdu specialitatea corecta',
                )]
            ]
            )
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
            'data_class' => Student::class,
        ]);
    }
}
