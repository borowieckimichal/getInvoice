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
class Company
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
     * @var int
     *
     * @ORM\Column(name="phone", type="string", length=25)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="companyLogo", type="blob")
     */
    private $companyLogo;

    /**
     * @var int
     *
     * @ORM\Column(name="nip", type="string", unique=true)
     */
    private $nip;

    /**
     * @var int
     *
     * @ORM\Column(name="iban", type="string", length=26)
     * @Assert\Length(min="26", minMessage="Your IBAN  must be at least 26 characters long")
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * Set companyLogo
     *
     * @param string $companyLogo
     * @return Company
     */
    public function setCompanyLogo($companyLogo)
    {
        $this->companyLogo = $companyLogo;

        return $this;
    }

    /**
     * Get companyLogo
     *
     * @return string 
     */
    public function getCompanyLogo()
    {
        return $this->companyLogo;
    }

    /**
     * Set nip
     *
     * @param integer $nip
     * @return Company
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
     * Set iban
     *
     * @param integer $iban
     * @return Company
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return integer 
     */
    public function getIban()
    {
        return $this->iban;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \getInvoiceBundle\Entity\User $user
     * @return Company
     */
    public function setUser(\getInvoiceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \getInvoiceBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     * @return Company
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
