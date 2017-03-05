<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use getInvoiceBundle\Form\InvoicePositionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('invoiceNo')->add('dateIssue')->add('dateSale')->add('datePayment')->add('paymentMethod')->add('bank')->add('iban')->add('sellerName')->add('sellerAddressStreet')->add('sellerAddressLocalNo')->add('sellerAddressFlatNo')->add('sellerPostalCode')->add('sellerAddressCity')->add('sellerPhone')->add('sellerNip')->add('customerName')->add('customerAddressStreet')->add('customerAddressLocalNo')->add('customerAddressFlatNo')->add('customerAddressPostalCode')->add('customerAddressCity')->add('customerPhone')->add('customerNip')->add('totalValueNet')->add('totalAmountVAT')->add('totalValueGross')->add('paid')->add('remainToPay')->add('toPayInWords')->add('authorisedToIssue')->add('allowedToReceive')
                ->add('positions', CollectionType::class, [
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
