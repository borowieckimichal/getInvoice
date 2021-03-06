<?php

namespace getInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\CustomerRepository")
 */
class Customer {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="addressStreet", type="string", length=255)
     */
    private $addressStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="addressPostalCode", type="string", length=255)
     */
    private $addressPostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="addressCity", type="string", length=255)
     */
    private $addressCity;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", length=255, unique=true)
     */
    private $nip;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="customer") 
     */
    private $invoices;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="customers", cascade={"remove"})
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE") 
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="customers", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE") 
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set addressStreet
     *
     * @param string $addressStreet
     * @return Customer
     */
    public function setAddressStreet($addressStreet) {
        $this->addressStreet = $addressStreet;

        return $this;
    }

    /**
     * Get addressStreet
     *
     * @return string 
     */
    public function getAddressStreet() {
        return $this->addressStreet;
    }

    /**
     * Set addressPostalCode
     *
     * @param string $addressPostalCode
     * @return Customer
     */
    public function setAddressPostalCode($addressPostalCode) {
        $this->addressPostalCode = $addressPostalCode;

        return $this;
    }

    /**
     * Get addressPostalCode
     *
     * @return string 
     */
    public function getAddressPostalCode() {
        return $this->addressPostalCode;
    }

    /**
     * Set addressCity
     *
     * @param string $addressCity
     * @return Customer
     */
    public function setAddressCity($addressCity) {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * Get addressCity
     *
     * @return string 
     */
    public function getAddressCity() {
        return $this->addressCity;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set nip
     *
     * @param string $nip
     * @return Customer
     */
    public function setNip($nip) {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return string 
     */
    public function getNip() {
        return $this->nip;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     * @return Customer
     */
    public function addInvoice(\getInvoiceBundle\Entity\Invoice $invoices) {
        $this->invoices[] = $invoices;

        return $this;
    }

    /**
     * Remove invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     */
    public function removeInvoice(\getInvoiceBundle\Entity\Invoice $invoices) {
        $this->invoices->removeElement($invoices);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoices() {
        return $this->invoices;
    }

    /**
     * Set company
     *
     * @param \getInvoiceBundle\Entity\Company $company
     * @return Customer
     */
    public function setCompany(\getInvoiceBundle\Entity\Company $company = null) {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \getInvoiceBundle\Entity\Company 
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * Set user
     *
     * @param \getInvoiceBundle\Entity\User $user
     * @return Customer
     */
    public function setUser(\getInvoiceBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \getInvoiceBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    public function __toString() {
        return (string) $this->getId();
    }

}
