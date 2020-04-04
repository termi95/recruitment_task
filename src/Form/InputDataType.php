<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class InputDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sizeOfSequence', NumberType::class,
                [
                    'required' => true,
                    'attr' => ['placeholder' => 'Podaj długość ciagu z zakresu od 1 do 99 999.',
                ]])
            ->add('submit', SubmitType::class);
    }
}