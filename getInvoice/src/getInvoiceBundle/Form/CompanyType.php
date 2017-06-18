<?php

namespace getInvoiceBundle\Form;

use getInvoiceBundle\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')->add('addressStreet', 'text')->add('addressLocalNo','text')->add('addressFlatNo')->add('addressPostalCode', 'text')->add('addressCity', 'text')->add('email', 'email')->add('phone', 'text')
                ->add('companyLogo', FileType::class, ['label' => 'Logo', 'data_class' => null, 'required' => false])->add('nip','integer')->add('iban', 'text')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Company::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'getinvoicebundle_company';
    }


}
