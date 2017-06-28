<?php

namespace getInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\CompanyRepository")
 */
class Company {

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
     * @ORM\Column(name="addressLocalNo", type="string", length=255)
     */
    private $addressLocalNo;

    /**
     * @var string
     *
     * @ORM\Column(name="addressFlatNo", type="string", length=255)
     */
    private $addressFlatNo;

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
     * @ORM\Column(name="companyLogo", type="string", nullable = true)
     * 
     * @Assert\Image(
     *      mimeTypes={ "image/jpg","image/jpeg", "image/png", "image/gif"}),
     *      mimeTypesMessage = "only image file",
     * ) 
     */
    private $companyLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", unique=true)
     */
    private $nip;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=34)
     * 
     */
    private $iban;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="companies")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="company") 
     */
    private $invoices;

    /**
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="company") 
     */
    private $customers;

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
     * @return Company
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
     * @return Company
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
     * Set addressLocalNo
     *
     * @param string $addressLocalNo
     * @return Company
     */
    public function setAddressLocalNo($addressLocalNo) {
        $this->addressLocalNo = $addressLocalNo;

        return $this;
    }

    /**
     * Get addressLocalNo
     *
     * @return string 
     */
    public function getAddressLocalNo() {
        return $this->addressLocalNo;
    }

    /**
     * Set addressFlatNo
     *
     * @param string $addressFlatNo
     * @return Company
     */
    public function setAddressFlatNo($addressFlatNo) {
        $this->addressFlatNo = $addressFlatNo;

        return $this;
    }

    /**
     * Get addressFlatNo
     *
     * @return string 
     */
    public function getAddressFlatNo() {
        return $this->addressFlatNo;
    }

    /**
     * Set addressPostalCode
     *
     * @param string $addressPostalCode
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * Set companyLogo
     *
     * @param string $companyLogo
     * @return Company
     */
    public function setCompanyLogo($companyLogo) {
        $this->companyLogo = $companyLogo;

        return $this;
    }

    /**
     * Get companyLogo
     *
     * @return string 
     */
    public function getCompanyLogo() {
        return $this->companyLogo;
    }

    /**
     * Set nip
     *
     * @param string $nip
     * @return Company
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
     * Set iban
     *
     * @param string $iban
     * @return Company
     */
    public function setIban($iban) {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string 
     */
    public function getIban() {
        return $this->iban;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \getInvoiceBundle\Entity\User $user
     * @return Company
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

    /**
     * Add invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     * @return Company
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
     * Add customers
     *
     * @param \getInvoiceBundle\Entity\Customer $customers
     * @return Company
     */
    public function addCustomer(\getInvoiceBundle\Entity\Customer $customers) {
        $this->customers[] = $customers;

        return $this;
    }

    /**
     * Remove customers
     *
     * @param \getInvoiceBundle\Entity\Customer $customers
     */
    public function removeCustomer(\getInvoiceBundle\Entity\Customer $customers) {
        $this->customers->removeElement($customers);
    }

    /**
     * Get customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomers() {
        return $this->customers;
    }

    public function __toString() {
        return (string) $this->getId();
    }

}
