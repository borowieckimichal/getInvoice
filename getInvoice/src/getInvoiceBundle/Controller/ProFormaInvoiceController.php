<?php

namespace getInvoiceBundle\Controller;

use getInvoiceBundle\Entity\User;
use getInvoiceBundle\Entity\ProFormaInvoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Proformainvoice controller.
 *
 * @Route("proformainvoice")
 */
class ProFormaInvoiceController extends Controller {

    /**
     * Lists all proFormaInvoice entities.
     *
     * @Route("/", name="proformainvoice_index")
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

        
        $proFormaInvoices = $em->getRepository('getInvoiceBundle:ProFormaInvoice')->findAll();

        $customers = $customerRepo->getAllcustomersByUserId($user);
        $companies = $companyRepo->findByUser($user);
        return $this->render('proformainvoice/index.html.twig', array(
                    'proFormaInvoices' => $proFormaInvoices,
                    'customers' => $customers,
                    'companies' => $companies,
        ));
    }

    /**
     * Creates a new proFormaInvoice entity.
     *
     * @Route("/new/{id}", requirements={"id":"\d+"}, name="proformainvoice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id) {
        $em =$this->getDoctrine()->getManager();
        $proFormaInvoice = new Proformainvoice();
        $customerRepo = $this->getDoctrine()->getRepository("getInvoiceBundle:Customer");
        $customer = $customerRepo->find($id);        
        
        $companyRepo = $this->getDoctrine()->getRepository("getInvoiceBundle:Company");
        $company = $companyRepo->find($customer->getCompany());        
        
        
        $form = $this->createForm('getInvoiceBundle\Form\ProFormaInvoiceType', $proFormaInvoice
                        ->setIban($company->getIban())->setSellerName($company->getName())->setSellerAddressStreet($company->getAddressStreet())
                        ->setInvoiceLogo($company->getCompanyLogo())->setSellerPostalCode($company->getAddressPostalCode())->setSellerAddressCity($company->getAddressCity())->setSellerPhone($company->getPhone())->setSellerNip($company->getNip())
                        ->setCustomerName($customer->getName())->setCustomerAddressStreet($customer->getAddressStreet())
                        ->setCustomerAddressPostalCode($customer->getAddressPostalCode())->setCustomerAddressCity($customer->getAddressCity())->setCustomerPhone($customer->getPhone())->setCustomerNip($customer->getNip()));
        $form->handleRequest($request);
        
        $newNumber = '/'. date('Y'); 

        if ($form->isSubmitted() && $form->isValid()) {

            $proFormaInvoice->setCustomer($customer);
            $proFormaInvoice->setCompany($company);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($proFormaInvoice);
            $em->flush($proFormaInvoice);
            $invoicePositions = $proFormaInvoice->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($proFormaInvoice);
            }
            $em->flush();                                  
            

            return $this->redirectToRoute('proformainvoice_show', array('id' => $proFormaInvoice->getId()));
        }

        return $this->render('proformainvoice/new.html.twig', array(
                    'proFormaInvoice' => $proFormaInvoice,
                    'company' => $company,
                    'form' => $form->createView(),
                    'newNumber' => $newNumber,
        ));
    }

    /**
     * Finds and displays a proFormaInvoice entity.
     *
     * @Route("/{id}", name="proformainvoice_show")
     * @Method("GET")
     */
    public function showAction(ProFormaInvoice $proFormaInvoice) {
        $deleteForm = $this->createDeleteForm($proFormaInvoice);

        return $this->render('proformainvoice/show.html.twig', array(
                    'proFormaInvoice' => $proFormaInvoice,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proFormaInvoice entity.
     *
     * @Route("/{id}/edit", name="proformainvoice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProFormaInvoice $proFormaInvoice) {
        $deleteForm = $this->createDeleteForm($proFormaInvoice);
        $editForm = $this->createForm('getInvoiceBundle\Form\ProFormaInvoiceType', $proFormaInvoice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $invoicePositions = $proFormaInvoice->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($proFormaInvoice);
            }
            
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proformainvoice_edit', array('id' => $proFormaInvoice->getId()));
        }

        return $this->render('proformainvoice/edit.html.twig', array(
                    'proFormaInvoice' => $proFormaInvoice,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proFormaInvoice entity.
     *
     * @Route("/{id}", name="proformainvoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProFormaInvoice $proFormaInvoice) {
        $form = $this->createDeleteForm($proFormaInvoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proFormaInvoice);
            $em->flush($proFormaInvoice);
        }

        return $this->redirectToRoute('proformainvoice_index');
    }

    /**
     * Creates a form to delete a proFormaInvoice entity.
     *
     * @param ProFormaInvoice $proFormaInvoice The proFormaInvoice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProFormaInvoice $proFormaInvoice) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('proformainvoice_delete', array('id' => $proFormaInvoice->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
