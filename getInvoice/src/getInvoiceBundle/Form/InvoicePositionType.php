<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoicePositionType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('ordinal', 'text', [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 40px;'
                    ]
                ])
                ->add('productName', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'nazwa produktu'
                    ]
                    ])
                ->add('pkwiu', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 70px;',
                        'placeholder' => 'PKWiU'
                    ]])
                ->add('quantity', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 70px;',
                        'placeholder' => 'ilość'
                    ]])
                ->add('unitMeasure', 'text', ['label' => false,
                    'attr' => [
                        'class' =>'form-control',
                        'style' => 'width : 40px;',
                        'placeholder' => 'JM'
                    ]])
                ->add('priceNet', 'number' , ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 100px;',
                        'placeholder' => 'cena netto'
                    ]])
                ->add('valueNet', 'number', ['label' => false, 
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 120px;',
                        'placeholder' => 'wartość netto'
                    ]])
                ->add('rateVAT', 'choice', ['label' => false, 
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 80px;'
                    ], 'choices' => [
                        23 => '23%',
                        8 => '8%',
                        5 => '5%',
                        0 => '0%',
                        -1 => 'ZW',
                        -2 => 'NP'
                    ]])
                ->add('amountVAT', 'number', ['label' => false ,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 100px;',
                        'placeholder' => 'kwota VAT'
                    ]])
                ->add('valueGross', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 120px;',
                        'placeholder' => 'kwota brutto'
                    ]]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'getInvoiceBundle\Entity\InvoicePosition'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'getinvoicebundle_invoice';
    }

}
