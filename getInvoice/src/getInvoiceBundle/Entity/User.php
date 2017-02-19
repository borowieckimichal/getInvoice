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
}
