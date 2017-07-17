<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use getInvoiceBundle\Form\InvoicePositionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('invoiceNo')->add('dateIssue', DateType::class, ['widget' => 'single_text', 'attr' => ['style' => 'width : 160px; float : right']] )
                ->add('dateSale', DateType::class,['widget' => 'single_text','attr' => ['style' => 'width : 160px; float : right']])
                ->add('datePayment', DateType::class, ['widget' => 'single_text', 'attr' => ['style' => 'width : 160px; float : right']])
                ->add('paymentMethod', ChoiceType::class, [
                    'choices' => [
                        'przelew' => 'przelew',
                        'gotówka' => 'gotówka',
                        'kompensata' => 'kompensata',
                        'karta kredytowa' => 'karta kredytowa', 
                        'barter' => 'barter',
                        'za pobraniem' => 'za pobraniem',
                        'zgodnie z umową' => 'zgodnie z umową',
                        'zapłacono' => 'zapłacono'
                    ]
                ])
                ->add('bank')->add('iban')->add('sellerName')->add('sellerAddressStreet')
                ->add('sellerAddressLocalNo')->add('sellerAddressFlatNo')->add('sellerPostalCode')
                ->add('sellerAddressCity')->add('sellerPhone')->add('sellerNip')->add('customerName')
                ->add('customerAddressStreet')->add('customerAddressLocalNo')->add('customerAddressFlatNo')
                ->add('customerAddressPostalCode')->add('customerAddressCity')->add('customerPhone')
                ->add('customerNip')->add('totalValueNet')->add('totalAmountVAT')->add('totalValueGross')
                ->add('paid', 'integer', ['precision' => 2])->add('remainToPay')->add('toPayInWords')->add('authorisedToIssue')->add('allowedToReceive')
                ->add('positions', CollectionType::class, [
                    'options' => array (
                            'label' => '  ',
                    ),
                    'entry_type' => InvoicePositionType::class,
                    'allow_add' => true,
                    'allow_delete' =>true,
                    'prototype' => true,
                    'attr' => [
                        'class' => 'pozycja row form-inline form-group',
                    ]
                    
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'getInvoiceBundle\Entity\Invoice'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'getinvoicebundle_invoice';
    }


}
