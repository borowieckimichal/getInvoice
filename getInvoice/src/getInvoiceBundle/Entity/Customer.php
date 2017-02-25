<?php

namespace getInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\CustomerRepository")
 */
class Customer
{
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
     * @var int
     *
     * @ORM\Column(name="addressLocalNo", type="string", length=255)
     */
    private $addressLocalNo;

    /**
     * @var int
     *
     * @ORM\Column(name="addressFlatNo", type="string", length=255)
     */
    private $addressFlatNo;

    /**
     * @var int
     *
     * @ORM\Column(name="addressPostalCode", type="integer", length=255)
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
     * @var int
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(name="nip", type="string", length=255, unique=true)
     */
    private $nip;
    
    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="customer") 
     */
    private $invoices;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set addressStreet
     *
     * @param string $addressStreet
     * @return Customer
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;

        return $this;
    }

    /**
     * Get addressStreet
     *
     * @return string 
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

    /**
     * Set addressLocalNo
     *
     * @param integer $addressLocalNo
     * @return Customer
     */
    public function setAddressLocalNo($addressLocalNo)
    {
        $this->addressLocalNo = $addressLocalNo;

        return $this;
    }

    /**
     * Get addressLocalNo
     *
     * @return integer 
     */
    public function getAddressLocalNo()
    {
        return $this->addressLocalNo;
    }

    /**
     * Set addressFlatNo
     *
     * @param integer $addressFlatNo
     * @return Customer
     */
    public function setAddressFlatNo($addressFlatNo)
    {
        $this->addressFlatNo = $addressFlatNo;

        return $this;
    }

    /**
     * Get addressFlatNo
     *
     * @return integer 
     */
    public function getAddressFlatNo()
    {
        return $this->addressFlatNo;
    }

    /**
     * Set addressPostalCode
     *
     * @param integer $addressPostalCode
     * @return Customer
     */
    public function setAddressPostalCode($addressPostalCode)
    {
        $this->addressPostalCode = $addressPostalCode;

        return $this;
    }

    /**
     * Get addressPostalCode
     *
     * @return integer 
     */
    public function getAddressPostalCode()
    {
        return $this->addressPostalCode;
    }

    /**
     * Set addressCity
     *
     * @param string $addressCity
     * @return Customer
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * Get addressCity
     *
     * @return string 
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set nip
     *
     * @param integer $nip
     * @return Customer
     */
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return integer 
     */
    public function getNip()
    {
        return $this->nip;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     * @return Customer
     */
    public function addInvoice(\getInvoiceBundle\Entity\Invoice $invoices)
    {
        $this->invoices[] = $invoices;

        return $this;
    }

    /**
     * Remove invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     */
    public function removeInvoice(\getInvoiceBundle\Entity\Invoice $invoices)
    {
        $this->invoices->removeElement($invoices);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}
