<?php

namespace getInvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')->add('addressStreet', 'text')->add('addressLocalNo', 'text')->add('addressFlatNo', 'text')->add('addressPostalCode', 'text')->add('addressCity', 'text')->add('email', 'email')->add('phone', 'integer')->add('nip', 'integer')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'getInvoiceBundle\Entity\Customer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'getinvoicebundle_customer';
    }


}
