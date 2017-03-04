<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoicePositionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ordinal')->add('productName')->add('pkwiu')->add('quantity')->add('unitMeasure')->add('priceNet')->add('valueNet')->add('rateVAT')->add('amountVAT')->add('valueGross');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'getInvoiceBundle\Entity\InvoicePosition'
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
