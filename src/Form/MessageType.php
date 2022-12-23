<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Votre nom'
                )
            ])
            ->add('phoneNumber', TelType::class, [
                'required' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Téléphone'
                )
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Email'
                )
            ])
            ->add('subject', ChoiceType::class, [
                'choices' => [
                    'Choix 1' => 'Choix 1',
                    'Choix 2' => 'Choix 2'
                ],
                'required' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Sujet'
                )
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Message'
                )
            ])
            ->add('isClient', CheckboxType::class, [
                'label' => 'Déjà client',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
