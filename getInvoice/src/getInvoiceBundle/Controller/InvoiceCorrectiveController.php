<?php

namespace getInvoiceBundle\Controller;

use getInvoiceBundle\Entity\InvoiceCorrective;
use getInvoiceBundle\Entity\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Invoicecorrective controller.
 *
 * @Route("invoicecorrective")
 */
class InvoiceCorrectiveController extends Controller {

    /**
     * Lists all invoiceCorrective entities.
     *
     * @Route("/", name="invoicecorrective_index")
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

        $invoiceCorrectives = $em->getRepository('getInvoiceBundle:InvoiceCorrective')->findAll();
        foreach ($invoiceCorrectives as $invoiceCorrective) {
            $deleteForm = $this->createDeleteForm($invoiceCorrective);
        }

        //if ($user instanceof User) {
            $customers = $customerRepo->getAllcustomersByUserId($user);
            $companies = $companyRepo->findByUser($user);
            return $this->render('invoicecorrective/index.html.twig', array(
                        'invoiceCorrectives' => $invoiceCorrectives,
                        'customers' => $customers,
                        'companies' => $companies,
                        'delete_form' => $deleteForm->createView(),
            ));
       // }
        //return $this->redirectToRoute("getinvoice_default_index");
    }

    /**
     * Creates a new invoiceCorrective entity.
     *
     * @Route("/{Id_invoice}/new", name="invoicecorrective_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $Id_invoice) {
        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository('getInvoiceBundle:Invoice')->find($Id_invoice);

        $invoiceCorrective = new Invoicecorrective();
        $form = $this->createForm('getInvoiceBundle\Form\InvoiceCorrectiveType', $invoiceCorrective->setInvoiceCorrected($invoice->getInvoiceNo())
                        ->setSellerName($invoice->getSellerName())->setSellerAddressStreet($invoice->getSellerAddressStreet())->setSellerPostalCode($invoice->getSellerPostalCode())
                        ->setSellerAddressCity($invoice->getSellerAddressCity())->setSellerPhone($invoice->getSellerPhone())->setSellerNip($invoice->getSellerNip())
                        ->setCustomerName($invoice->getCustomerName())->setCustomerAddressStreet($invoice->getCustomerAddressStreet())
                        ->setCustomerAddressPostalCode($invoice->getCustomerAddressPostalCode())->setCustomerAddressCity($invoice->getCustomerAddressCity())
                        ->setCustomerPhone($invoice->getCustomerPhone())->setCustomerNip($invoice->getCustomerNip())->setIban($invoice->getIban())
                        ->setInvoices($invoice)->setInvoiceLogo($invoice->getInvoiceLogo()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoiceCorrective);
            $invoicePositions = $invoiceCorrective->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($invoiceCorrective);
            }
            $em->flush($invoiceCorrective);

            return $this->redirectToRoute('invoicecorrective_show', array('id' => $invoiceCorrective->getId()));
        }

        return $this->render('invoicecorrective/new.html.twig', array(
                    'invoiceCorrective' => $invoiceCorrective,
                    'form' => $form->createView(),
                    'invoice' => $invoice,
        ));
    }

    /**
     * Finds and displays a invoiceCorrective entity.
     *
     * @Route("/{id}", name="invoicecorrective_show")
     * @Method("GET")
     */
    public function showAction(InvoiceCorrective $invoiceCorrective) {
        $deleteForm = $this->createDeleteForm($invoiceCorrective);

        
        return $this->render('invoicecorrective/show.html.twig', array(
                    'invoiceCorrective' => $invoiceCorrective,
                    'delete_form' => $deleteForm->createView(),
                   // 'invoiceCorrected' => $invoiceCorrected,
        ));
    }

    /**
     * Displays a form to edit an existing invoiceCorrective entity.
     *
     * @Route("/{id}/edit", name="invoicecorrective_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InvoiceCorrective $invoiceCorrective) {
        $deleteForm = $this->createDeleteForm($invoiceCorrective);
        $editForm = $this->createForm('getInvoiceBundle\Form\InvoiceCorrectiveType', $invoiceCorrective);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoicecorrective_edit', array('id' => $invoiceCorrective->getId()));
        }

        return $this->render('invoicecorrective/edit.html.twig', array(
                    'invoiceCorrective' => $invoiceCorrective,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invoiceCorrective entity.
     *
     * @Route("/{id}", name="invoicecorrective_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InvoiceCorrective $invoiceCorrective) {
        $form = $this->createDeleteForm($invoiceCorrective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoiceCorrective);
            $em->flush($invoiceCorrective);
        }

        return $this->redirectToRoute('invoicecorrective_index');
    }

    /**
     * Creates a form to delete a invoiceCorrective entity.
     *
     * @param InvoiceCorrective $invoiceCorrective The invoiceCorrective entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InvoiceCorrective $invoiceCorrective) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('invoicecorrective_delete', array('id' => $invoiceCorrective->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
