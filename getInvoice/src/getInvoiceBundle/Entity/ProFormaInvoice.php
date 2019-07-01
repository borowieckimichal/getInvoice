<?php

namespace getInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProFormaInvoice
 *
 * @ORM\Table(name="pro_forma_invoice")
 * @ORM\Entity(repositoryClass="getInvoiceBundle\Repository\ProFormaInvoiceRepository")
 */
class ProFormaInvoice extends Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    protected $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="proforma")
     * @ORM\JoinColumn(name="proforma_id", referencedColumnName="id") 
     */
    protected $invoices;

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
     * Set comments
     *
     * @param string $comments
     * @return ProFormaInvoice
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set invoices
     *
     * @param \getInvoiceBundle\Entity\Invoice $invoices
     * @return ProFormaInvoice
     */
    public function setInvoices(\getInvoiceBundle\Entity\Invoice $invoices = null)
    {
        $this->invoices = $invoices;

        return $this;
    }

    /**
     * Get invoices
     *
     * @return \getInvoiceBundle\Entity\Invoice 
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * Add proforma
     *
     * @param \getInvoiceBundle\Entity\ProFormaInvoice $proforma
     * @return ProFormaInvoice
     */
    public function addProforma(\getInvoiceBundle\Entity\ProFormaInvoice $proforma)
    {
        $this->proforma[] = $proforma;

        return $this;
    }

    /**
     * Remove proforma
     *
     * @param \getInvoiceBundle\Entity\ProFormaInvoice $proforma
     */
    public function removeProforma(\getInvoiceBundle\Entity\ProFormaInvoice $proforma)
    {
        $this->proforma->removeElement($proforma);
    }

    /**
     * Get proforma
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProforma()
    {
        return $this->proforma;
    }
}
