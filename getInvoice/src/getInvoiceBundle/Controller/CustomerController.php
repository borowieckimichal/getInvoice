<?php

namespace getInvoiceBundle\Controller;

use getInvoiceBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use getInvoiceBundle\Entity\User;


/**
 * Customer controller.
 *
 * @Route("customer")
 */
class CustomerController extends Controller {

    /**
     * Lists all customer entities.
     *
     * @Route("/", name="customer_index")
     * @Method("GET")
     */
    public function indexAction() {
        $repo = $this->getDoctrine()->getRepository('getInvoiceBundle:Customer');

        $user = $this->container
                ->get('security.context')
                ->getToken()
                ->getUser();
        $user->getId();

        if ($user instanceof User) {
            $customers = $repo->getAllCustomersByUserId($user);
           
            return $this->render('customer/index.html.twig', array(
                        'customers' => $customers,
                        
            ));
        }
        return $this->redirectToRoute("getinvoice_default_index");
    }

    /**
     * Creates a new customer entity.
     *
     * @Route("/new/{id}", name="customer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id) {
        $customer = new Customer();
        $companyRepo = $this->getDoctrine()->getRepository("getInvoiceBundle:Company");
        $company = $companyRepo->find($id);
        $customer->setCompany($company);
        
        $form = $this->createForm('getInvoiceBundle\Form\CustomerType', $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container
                    ->get('security.context')
                    ->getToken()
                    ->getUser();
            $user->getId();
            
            $customer = $form->getData();
            $customer->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush($customer);

            return $this->redirectToRoute('customer_show', array('id' => $customer->getId()));
        }

        return $this->render('customer/new.html.twig', array(
                    'customer' => $customer,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a customer entity.
     *
     * @Route("/{id}", name="customer_show")
     * @Method("GET")
     */
    public function showAction(Customer $customer) {
        $deleteForm = $this->createDeleteForm($customer);

        return $this->render('customer/show.html.twig', array(
                    'customer' => $customer,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing customer entity.
     *
     * @Route("/{id}/edit", name="customer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Customer $customer) {
        $deleteForm = $this->createDeleteForm($customer);
        $editForm = $this->createForm('getInvoiceBundle\Form\CustomerType', $customer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customer_edit', array('id' => $customer->getId()));
        }

        return $this->render('customer/edit.html.twig', array(
                    'customer' => $customer,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a customer entity.
     *
     * @Route("/{id}", name="customer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Customer $customer) {
        $form = $this->createDeleteForm($customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customer);
            $em->flush($customer);
        }

        return $this->redirectToRoute('customer_index');
    }

    /**
     * Creates a form to delete a customer entity.
     *
     * @param Customer $customer The customer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Customer $customer) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('customer_delete', array('id' => $customer->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
