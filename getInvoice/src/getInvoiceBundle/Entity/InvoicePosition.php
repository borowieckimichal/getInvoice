<?php

namespace getInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoicePosition
 *
 * @ORM\Table(name="invoice_position")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\InvoicePositionRepository")
 */
class InvoicePosition
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
     * @var int
     *
     * @ORM\Column(name="ordinal", type="integer")
     */
    private $ordinal;

    /**
     * @var string
     *
     * @ORM\Column(name="productName", type="string", length=255)
     */
    private $productName;

    /**
     * @var int
     *
     * @ORM\Column(name="pkwiu", type="integer", nullable = true)
     */
    private $pkwiu;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="decimal", precision=10, scale=2)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="unitMeasure", type="string", length=255)
     */
    private $unitMeasure;

    /**
     * @var int
     *
     * @ORM\Column(name="priceNet", type="decimal", precision=10, scale=2)
     */
    private $priceNet;

    /**
     * @var int
     *
     * @ORM\Column(name="valueNet", type="decimal", precision=10, scale=2)
     */
    private $valueNet;

    /**
     * @var int
     *
     * @ORM\Column(name="rateVAT", type="decimal", precision=10, scale=2)
     */
    private $rateVAT;

    /**
     * @var int
     *
     * @ORM\Column(name="amountVAT", type="decimal", precision=10, scale=2)
     */
    private $amountVAT;

    /**
     * @var int
     *
     * @ORM\Column(name="valueGross", type="decimal", precision=10, scale=2)
     */
    private $valueGross;
    
    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="positions")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", onDelete="CASCADE", nullable=true) 
     */
    private $invoice;

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
     * Set ordinal
     *
     * @param integer $ordinal
     * @return InvoicePosition
     */
    public function setOrdinal($ordinal)
    {
        $this->ordinal = $ordinal;

        return $this;
    }

    /**
     * Get ordinal
     *
     * @return integer 
     */
    public function getOrdinal()
    {
        return $this->ordinal;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return InvoicePosition
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set pkwiu
     *
     * @param integer $pkwiu
     * @return InvoicePosition
     */
    public function setPkwiu($pkwiu)
    {
        $this->pkwiu = $pkwiu;

        return $this;
    }

    /**
     * Get pkwiu
     *
     * @return integer 
     */
    public function getPkwiu()
    {
        return $this->pkwiu;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return InvoicePosition
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitMeasure
     *
     * @param string $unitMeasure
     * @return InvoicePosition
     */
    public function setUnitMeasure($unitMeasure)
    {
        $this->unitMeasure = $unitMeasure;

        return $this;
    }

    /**
     * Get unitMeasure
     *
     * @return string 
     */
    public function getUnitMeasure()
    {
        return $this->unitMeasure;
    }

    /**
     * Set priceNet
     *
     * @param integer $priceNet
     * @return InvoicePosition
     */
    public function setPriceNet($priceNet)
    {
        $this->priceNet = $priceNet;

        return $this;
    }

    /**
     * Get priceNet
     *
     * @return integer 
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }

    /**
     * Set valueNet
     *
     * @param integer $valueNet
     * @return InvoicePosition
     */
    public function setValueNet($valueNet)
    {
        $this->valueNet = $valueNet;

        return $this;
    }

    /**
     * Get valueNet
     *
     * @return integer 
     */
    public function getValueNet()
    {
        return $this->valueNet;
    }

    /**
     * Set rateVAT
     *
     * @param integer $rateVAT
     * @return InvoicePosition
     */
    public function setRateVAT($rateVAT)
    {
        $this->rateVAT = $rateVAT;

        return $this;
    }

    /**
     * Get rateVAT
     *
     * @return integer 
     */
    public function getRateVAT()
    {
        return $this->rateVAT;
    }

    /**
     * Set amountVAT
     *
     * @param integer $amountVAT
     * @return InvoicePosition
     */
    public function setAmountVAT($amountVAT)
    {
        $this->amountVAT = $amountVAT;

        return $this;
    }

    /**
     * Get amountVAT
     *
     * @return integer 
     */
    public function getAmountVAT()
    {
        return $this->amountVAT;
    }

    /**
     * Set valueGross
     *
     * @param integer $valueGross
     * @return InvoicePosition
     */
    public function setValueGross($valueGross)
    {
        $this->valueGross = $valueGross;

        return $this;
    }

    /**
     * Get valueGross
     *
     * @return integer 
     */
    public function getValueGross()
    {
        return $this->valueGross;
    }

    /**
     * Set invoice
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoice
     * @return InvoicePosition
     */
    public function setInvoice(\getInvoiceBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \getInvoiceBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}
