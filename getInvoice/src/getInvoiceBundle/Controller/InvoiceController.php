<?php

namespace getInvoiceBundle\Controller;

use getInvoiceBundle\Entity\Invoice;
use getInvoiceBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Invoice controller.
 *
 * @Route("invoice")
 */
class InvoiceController extends Controller {

    /**
     * Lists all invoice entities.
     *
     * @Route("/", name="invoice_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $customerRepo = $this->getDoctrine()->getRepository('getInvoiceBundle:Customer');
        $companyRepo = $this->getDoctrine()->getRepository('getInvoiceBundle:Company');
        $user = $this->container
                ->get('security.context')
                ->getToken()
                ->getUser();
        $user->getId();
        $invoices = $em->getRepository('getInvoiceBundle:Invoice')->findAll();
        foreach ($invoices as $invoice) {
            $deleteForm = $this->createDeleteForm($invoice);
        }


        if ($user instanceof User) {
            $customers = $customerRepo->getAllCustomersByUserId($user);
            $companies = $companyRepo->findByUser($user);
            return $this->render('invoice/index.html.twig', array(
                        'invoices' => $invoices,
                        'customers' => $customers,
                        'companies' => $companies,
                        'delete_form' => $deleteForm->createView(),
            ));
        }
        return $this->redirectToRoute("getinvoice_default_index");
    }

    /**
     * Creates a new invoice entity.
     *
     * @Route("/new/{id}", requirements={"id":"\d+"}, name="invoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id) {
        $em =$this->getDoctrine()->getManager();
        $invoice = new Invoice();
        $customerRepo = $this->getDoctrine()->getRepository("getInvoiceBundle:Customer");
        $customer = $customerRepo->find($id);

        $companyRepo = $this->getDoctrine()->getRepository("getInvoiceBundle:Company");
        $company = $companyRepo->find($customer->getCompany());

        $form = $this->createForm('getInvoiceBundle\Form\InvoiceType', $invoice
                        ->setIban($company->getIban())->setSellerName($company->getName())->setSellerAddressStreet($company->getAddressStreet())
                        ->setInvoiceLogo($company->getCompanyLogo())->setSellerPostalCode($company->getAddressPostalCode())->setSellerAddressCity($company->getAddressCity())->setSellerPhone($company->getPhone())->setSellerNip($company->getNip())
                        ->setCustomerName($customer->getName())->setCustomerAddressStreet($customer->getAddressStreet())
                        ->setCustomerAddressPostalCode($customer->getAddressPostalCode())->setCustomerAddressCity($customer->getAddressCity())->setCustomerPhone($customer->getPhone())->setCustomerNip($customer->getNip()));
        $form->handleRequest($request);

        $newNumber = '/'. date('Y');    

        if ($form->isSubmitted() && $form->isValid()) {

            $invoice->setCustomer($customer);
            $invoice->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush($invoice);
            $invoicePositions = $invoice->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($invoice);
            }
            $em->flush();

            return $this->redirectToRoute('invoice_show', array('id' => $invoice->getId()));
        }

        return $this->render('invoice/new.html.twig', array(
                    'invoice' => $invoice,
                    'company' => $company,
                    'form' => $form->createView(),
                    'newNumber' => $newNumber,
        ));
    }

    /**
     * Finds and displays a invoice entity.
     *
     * @Route("/{id}", name="invoice_show")
     * @Method("GET")
     */
    public function showAction(Invoice $invoice) {
        $deleteForm = $this->createDeleteForm($invoice);

        return $this->render('invoice/show.html.twig', array(
                    'invoice' => $invoice,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing invoice entity.
     *
     * @Route("/{id}/edit", name="invoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Invoice $invoice) {
        $deleteForm = $this->createDeleteForm($invoice);
        $editForm = $this->createForm('getInvoiceBundle\Form\InvoiceType', $invoice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $invoicePositions = $invoice->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($invoice);
            }
                       
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoice_edit', array('id' => $invoice->getId()));
        }

        return $this->render('invoice/edit.html.twig', array(
                    'invoice' => $invoice,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invoice entity.
     *
     * @Route("/{id}", name="invoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Invoice $invoice) {
        $form = $this->createDeleteForm($invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoice);
            $em->flush($invoice);
        }

        return $this->redirectToRoute('invoice_index');
    }

    /**
     * Creates a form to delete a invoice entity.
     *
     * @param Invoice $invoice The invoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Invoice $invoice) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('invoice_delete', array('id' => $invoice->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Export to PDF
     * 
     * @Route("/{id}/pdf", name="invoice_pdf")
     * @Method({"GET", "POST"})
     */
    public function pdfAction(Invoice $invoice) {
        $deleteForm = $this->createDeleteForm($invoice);
        $html = $this->renderView('invoice/pdf.html.twig', 
                array('invoice' => $invoice,
                      'delete_form' => $deleteForm->createView(),
        ));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html,
                    array(
                        'lowquality' => false,
                        'encoding' => 'utf-8',
                        'images' => true,
                        'enable-javascript'=> true,
                        'javascript-delay'=> 5000
                    )), 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="faktura.pdf"'
                )
        );
    }

}
