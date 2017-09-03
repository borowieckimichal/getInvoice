<?php

namespace getInvoiceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="invoiceNo", type="string")
     */
    private $invoiceNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateIssue", type="date")
     */
    private $dateIssue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSale", type="date")
     */
    private $dateSale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePayment", type="date")
     */
    private $datePayment;

    /**
     * @var string
     *
     * @ORM\Column(name="paymentMethod", type="string", length=255)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=34)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerName", type="string", length=255)
     */
    private $sellerName;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerAddressStreet", type="string", length=255)
     */
    private $sellerAddressStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerPostalCode", type="string", length=255)
     */
    private $sellerPostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerAddressCity", type="string", length=255)
     */
    private $sellerAddressCity;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerPhone", type="string", length=255)
     */
    private $sellerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="sellerNip", type="string")
     */
    private $sellerNip;

    /**
     * @var string
     *
     * @ORM\Column(name="customerName", type="string", length=255)
     */
    private $customerName;

    /**
     * @var int
     *
     * @ORM\Column(name="customerAddressStreet", type="string")
     */
    private $customerAddressStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="customerAddressPostalCode", type="string", length=255)
     */
    private $customerAddressPostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="customerAddressCity", type="string", length=255)
     */
    private $customerAddressCity;

    /**
     * @var string
     *
     * @ORM\Column(name="customerPhone", type="string", length=255)
     */
    private $customerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="customerNip", type="string", length=255)
     */
    private $customerNip;

    /**
     * @var int
     *
     * @ORM\Column(name="totalValueNet", type="decimal", precision=10,  scale=2)
     */
    private $totalValueNet;

    /**
     * @var int
     *
     * @ORM\Column(name="totalAmountVAT", type="decimal", precision=10, scale=2)
     */
    private $totalAmountVAT;

    /**
     * @var int
     *
     * @ORM\Column(name="totalValueGross", type="decimal", precision=10, scale=2)
     */
    private $totalValueGross;

    /**
     * @var int
     *
     * @ORM\Column(name="paid", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $paid;

    /**
     * @var int
     *
     * @ORM\Column(name="remainToPay", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $remainToPay;

    /**
     * @var string
     *
     * @ORM\Column(name="toPayInWords", type="string", length=255)
     */
    private $toPayInWords;

    /**
     * @var string
     *
     * @ORM\Column(name="authorisedToIssue", type="string", length=255, nullable=true)
     */
    private $authorisedToIssue;

    /**
     * @var string
     *
     * @ORM\Column(name="allowedToReceive", type="string", length=255, nullable=true)
     */
    private $allowedToReceive;
    
    /**
     * @var string
     *
     * @ORM\Column(name="invoiceLogo", type="string", nullable = true)
     *  
     */
    
    private $invoiceLogo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="invoices")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id") 
     */
    private $company;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="invoices")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;
    
    /**
     * @ORM\OneToMany(targetEntity="InvoicePosition", mappedBy="invoice", cascade={"persist"}) 
     */
    
    private $positions;
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
     * Set invoiceNo
     *
     * @param integer $invoiceNo
     * @return Invoice
     */
    public function setInvoiceNo($invoiceNo)
    {
        $this->invoiceNo = $invoiceNo;

        return $this;
    }

    /**
     * Get invoiceNo
     *
     * @return integer 
     */
    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    /**
     * Set dateIssue
     *
     * @param \DateTime $dateIssue
     * @return Invoice
     */
    public function setDateIssue($dateIssue)
    {
        $this->dateIssue = $dateIssue;

        return $this;
    }

    /**
     * Get dateIssue
     *
     * @return \DateTime 
     */
    public function getDateIssue()
    {
        return $this->dateIssue;
    }

    /**
     * Set dateSale
     *
     * @param \DateTime $dateSale
     * @return Invoice
     */
    public function setDateSale($dateSale)
    {
        $this->dateSale = $dateSale;

        return $this;
    }

    /**
     * Get dateSale
     *
     * @return \DateTime 
     */
    public function getDateSale()
    {
        return $this->dateSale;
    }

    /**
     * Set datePayment
     *
     * @param \DateTime $datePayment
     * @return Invoice
     */
    public function setDatePayment($datePayment)
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    /**
     * Get datePayment
     *
     * @return \DateTime 
     */
    public function getDatePayment()
    {
        return $this->datePayment;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     * @return Invoice
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Invoice
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set iban
     *
     * @param integer $iban
     * @return Invoice
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
     * Set sellerName
     *
     * @param string $sellerName
     * @return Invoice
     */
    public function setSellerName($sellerName)
    {
        $this->sellerName = $sellerName;

        return $this;
    }

    /**
     * Get sellerName
     *
     * @return string 
     */
    public function getSellerName()
    {
        return $this->sellerName;
    }

    /**
     * Set sellerAddressStreet
     *
     * @param string $sellerAddressStreet
     * @return Invoice
     */
    public function setSellerAddressStreet($sellerAddressStreet)
    {
        $this->sellerAddressStreet = $sellerAddressStreet;

        return $this;
    }

    /**
     * Get sellerAddressStreet
     *
     * @return string 
     */
    public function getSellerAddressStreet()
    {
        return $this->sellerAddressStreet;
    }


    /**
     * Set sellerPostalCode
     *
     * @param integer $sellerPostalCode
     * @return Invoice
     */
    public function setSellerPostalCode($sellerPostalCode)
    {
        $this->sellerPostalCode = $sellerPostalCode;

        return $this;
    }

    /**
     * Get sellerPostalCode
     *
     * @return integer 
     */
    public function getSellerPostalCode()
    {
        return $this->sellerPostalCode;
    }

    /**
     * Set sellerAddressCity
     *
     * @param string $sellerAddressCity
     * @return Invoice
     */
    public function setSellerAddressCity($sellerAddressCity)
    {
        $this->sellerAddressCity = $sellerAddressCity;

        return $this;
    }

    /**
     * Get sellerAddressCity
     *
     * @return string 
     */
    public function getSellerAddressCity()
    {
        return $this->sellerAddressCity;
    }

    /**
     * Set sellerPhone
     *
     * @param integer $sellerPhone
     * @return Invoice
     */
    public function setSellerPhone($sellerPhone)
    {
        $this->sellerPhone = $sellerPhone;

        return $this;
    }

    /**
     * Get sellerPhone
     *
     * @return integer 
     */
    public function getSellerPhone()
    {
        return $this->sellerPhone;
    }

    /**
     * Set sellerNip
     *
     * @param integer $sellerNip
     * @return Invoice
     */
    public function setSellerNip($sellerNip)
    {
        $this->sellerNip = $sellerNip;

        return $this;
    }

    /**
     * Get sellerNIP
     *
     * @return integer 
     */
    public function getSellerNip()
    {
        return $this->sellerNip;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     * @return Invoice
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string 
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set customerAddressStreet
     *
     * @param integer $customerAddressStreet
     * @return Invoice
     */
    public function setCustomerAddressStreet($customerAddressStreet)
    {
        $this->customerAddressStreet = $customerAddressStreet;

        return $this;
    }

    /**
     * Get customerAddressStreet
     *
     * @return integer 
     */
    public function getCustomerAddressStreet()
    {
        return $this->customerAddressStreet;
    }

    /**
     * Set customerAddressPostalCode
     *
     * @param integer $customerAddressPostalCode
     * @return Invoice
     */
    public function setCustomerAddressPostalCode($customerAddressPostalCode)
    {
        $this->customerAddressPostalCode = $customerAddressPostalCode;

        return $this;
    }

    /**
     * Get customerAddressPostalCode
     *
     * @return integer 
     */
    public function getCustomerAddressPostalCode()
    {
        return $this->customerAddressPostalCode;
    }

    /**
     * Set customerAddressCity
     *
     * @param string $customerAddressCity
     * @return Invoice
     */
    public function setCustomerAddressCity($customerAddressCity)
    {
        $this->customerAddressCity = $customerAddressCity;

        return $this;
    }

    /**
     * Get customerAddressCity
     *
     * @return string 
     */
    public function getCustomerAddressCity()
    {
        return $this->customerAddressCity;
    }

    /**
     * Set customerPhone
     *
     * @param integer $customerPhone
     * @return Invoice
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    /**
     * Get customerPhone
     *
     * @return integer 
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * Set customerNip
     *
     * @param integer $customerNip
     * @return Invoice
     */
    public function setCustomerNip($customerNip)
    {
        $this->customerNip = $customerNip;

        return $this;
    }

    /**
     * Get customerNIP
     *
     * @return integer 
     */
    public function getCustomerNip()
    {
        return $this->customerNip;
    }

    /**
     * Set totalValueNet
     *
     * @param integer $totalValueNet
     * @return Invoice
     */
    public function setTotalValueNet($totalValueNet)
    {
        $this->totalValueNet = $totalValueNet;

        return $this;
    }

    /**
     * Get totalValueNet
     *
     * @return integer 
     */
    public function getTotalValueNet()
    {
        return $this->totalValueNet;
    }

    /**
     * Set totalAmountVAT
     *
     * @param integer $totalAmountVAT
     * @return Invoice
     */
    public function setTotalAmountVAT($totalAmountVAT)
    {
        $this->totalAmountVAT = $totalAmountVAT;

        return $this;
    }

    /**
     * Get totalAmountVAT
     *
     * @return integer 
     */
    public function getTotalAmountVAT()
    {
        return $this->totalAmountVAT;
    }

    /**
     * Set totalValueGross
     *
     * @param integer $totalValueGross
     * @return Invoice
     */
    public function setTotalValueGross($totalValueGross)
    {
        $this->totalValueGross = $totalValueGross;

        return $this;
    }

    /**
     * Get totalValueGross
     *
     * @return integer 
     */
    public function getTotalValueGross()
    {
        return $this->totalValueGross;
    }

    /**
     * Set paid
     *
     * @param integer $paid
     * @return Invoice
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return integer 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set remainToPay
     *
     * @param integer $remainToPay
     * @return Invoice
     */
    public function setRemainToPay($remainToPay)
    {
        $this->remainToPay = $remainToPay;

        return $this;
    }

    /**
     * Get remainToPay
     *
     * @return integer 
     */
    public function getRemainToPay()
    {
        return $this->remainToPay;
    }

    /**
     * Set toPayInWords
     *
     * @param string $toPayInWords
     * @return Invoice
     */
    public function setToPayInWords($toPayInWords)
    {
        $this->toPayInWords = $toPayInWords;

        return $this;
    }

    /**
     * Get toPayInWords
     *
     * @return string 
     */
    public function getToPayInWords()
    {
        return $this->toPayInWords;
    }

    /**
     * Set authorisedToIssue
     *
     * @param string $authorisedToIssue
     * @return Invoice
     */
    public function setAuthorisedToIssue($authorisedToIssue)
    {
        $this->authorisedToIssue = $authorisedToIssue;

        return $this;
    }

    /**
     * Get authorisedToIssue
     *
     * @return string 
     */
    public function getAuthorisedToIssue()
    {
        return $this->authorisedToIssue;
    }

    /**
     * Set allowedToReceive
     *
     * @param string $allowedToReceive
     * @return Invoice
     */
    public function setAllowedToReceive($allowedToReceive)
    {
        $this->allowedToReceive = $allowedToReceive;

        return $this;
    }

    /**
     * Get allowedToReceive
     *
     * @return string 
     */
    public function getAllowedToReceive()
    {
        return $this->allowedToReceive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->positions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set company
     *
     * @param \getInvoiceBundle\Entity\Company $company
     * @return Invoice
     */
    public function setCompany(\getInvoiceBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \getInvoiceBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set customer
     *
     * @param \getInvoiceBundle\Entity\Customer $customer
     * @return Invoice
     */
    public function setCustomer(\getInvoiceBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \getInvoiceBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add positions
     *
     * @param \getInvoiceBundle\Entity\InvoicePosition $positions
     * @return Invoice
     */
    public function addPosition(\getInvoiceBundle\Entity\InvoicePosition $positions)
    {
        //$positions->setInvoice($this);
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \getInvoiceBundle\Entity\InvoicePosition $positions
     */
    public function removePosition(\getInvoiceBundle\Entity\InvoicePosition $positions)
    {
        $this->positions->removeElement($positions);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set invoiceLogo
     *
     * @param string $invoiceLogo
     * @return Invoice
     */
    public function setInvoiceLogo($invoiceLogo)
    {
        $this->invoiceLogo = $invoiceLogo;

        return $this;
    }

    /**
     * Get invoiceLogo
     *
     * @return string 
     */
    public function getInvoiceLogo()
    {
        return $this->invoiceLogo;
    }
}
