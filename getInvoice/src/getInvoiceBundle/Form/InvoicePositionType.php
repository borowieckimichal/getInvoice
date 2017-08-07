<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use getInvoiceBundle\Entity\Invoice;

class InvoicePositionType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('ordinal', 'text', [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 45px; float : left',
                        'placeholder' => 'Lp'
                    ]
                ])
                ->add('productName', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 220px; float : left',
                        'placeholder' => 'nazwa produktu'
                    ]
                ])
                ->add('pkwiu', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 70px; float : left',
                        'placeholder' => 'PKWiU'
                    ],
                    'required' => false])
                ->add('quantity', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 70px; float : left',
                        'placeholder' => 'ilość'
            ]])
                ->add('unitMeasure', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 45px; float : left',
                        'placeholder' => 'JM'
            ]])
                ->add('priceNet', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 100px; float : left',
                        'placeholder' => 'cena netto'
            ]])
                ->add('valueNet', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 120px; float : left',
                        'placeholder' => 'wartość netto'
            ]])
                ->add('rateVAT', 'choice', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 80px; float : left'
                    ], 'choices' => [
                        23 => '23%',
                        8 => '8%',
                        5 => '5%',
                        0 => '0%',
                        -1 => 'ZW',
                        -2 => 'NP'
            ]])
                ->add('amountVAT', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 100px; float : left',
                        'placeholder' => 'kwota VAT'
            ]])
                ->add('valueGross', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 110px; float : left',
                        'placeholder' => 'kwota brutto'
            ]])
                ->add('invoice', HiddenType::class, [
                    'data_class'  => (new Invoice())->getId()
                ] 
                    
        );
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
