<?php

namespace getInvoiceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {

        parent::__construct();
    }
    /**
     *
     * @ORM\OneToMany(targetEntity="Company", mappedBy="user")
     */
    
    private $companies;
    
    /**
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="user") 
     */
    private $customers;

    /**
     * Add companies
     *
     * @param \getInvoiceBundle\Entity\Company $companies
     * @return User
     */
    public function addCompany(\getInvoiceBundle\Entity\Company $companies)
    {
        $this->companies[] = $companies;

        return $this;
    }

    /**
     * Remove companies
     *
     * @param \getInvoiceBundle\Entity\Company $companies
     */
    public function removeCompany(\getInvoiceBundle\Entity\Company $companies)
    {
        $this->companies->removeElement($companies);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * Add customers
     *
     * @param \getInvoiceBundle\Entity\Customer $customers
     * @return User
     */
    public function addCustomer(\getInvoiceBundle\Entity\Customer $customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove customers
     *
     * @param \getInvoiceBundle\Entity\Customer $customers
     */
    public function removeCustomer(\getInvoiceBundle\Entity\Customer $customers)
    {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}
