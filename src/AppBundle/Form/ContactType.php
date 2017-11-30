<?php declare(strict_types = 1);

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, array(
                'required' => true,
            ))
            ->add('name', TextType::class, array(
                'required' => true,
            ))
            ->add('phone', TextType::class, array(
                'required' => false,
            ))
            ->add('msg', TextareaType::class, array(
                    'required' => true,
                    'attr' => array(
                        'rows' => 5 ,
                    ),
                )
            );
    }
}