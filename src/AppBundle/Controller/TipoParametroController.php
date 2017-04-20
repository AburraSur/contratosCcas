<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoParametro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Tipoparametro controller.
 *
 * @Route("tipoparametro")
 */
class TipoParametroController extends Controller
{
    /**
     * Lists all tipoParametro entities.
     *
     * @Route("/", name="tipoparametro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoParametros = $em->getRepository('AppBundle:TipoParametro')->findAll();

        return $this->render('tipoparametro/index.html.twig', array(
            'tipoParametros' => $tipoParametros,
        ));
    }

    /**
     * Creates a new tipoParametro entity.
     *
     * @Route("/new", name="tipoparametro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoParametro = new Tipoparametro();
//        $form = $this->createForm('AppBundle\Form\TipoParametroType', $tipoParametro);
//        $form->handleRequest($request);
        $form = $this->createFormBuilder($tipoParametro)
                ->add('parametro',TextType::class, array('label' => 'Tipo Parametros', 'attr' => array('class' => 'form-control','id' => 'tipoParam', 'placeholder' => 'Tipo Parametro')))
                ->add('current', DateType::class, array(
                        'label' => 'Fecha creación',
                        'widget' => 'single_text',
                        'html5' => false,
                        'attr' => ['class' => 'datepicker form-control' ],
                    ))
                ->add('save', SubmitType::class, array('label' => 'Guardar' , 'attr' => array('class' => 'btn btn-default')))
                ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoParametro);
            $em->flush($tipoParametro);

            return $this->redirectToRoute('tipoparametro_show', array('id' => $tipoParametro->getId()));
        }

        return $this->render('tipoparametro/new.html.twig', array(
            'tipoParametro' => $tipoParametro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoParametro entity.
     *
     * @Route("/{id}", name="tipoparametro_show")
     * @Method("GET")
     */
    public function showAction(TipoParametro $tipoParametro)
    {
        $deleteForm = $this->createDeleteForm($tipoParametro);

        return $this->render('tipoparametro/show.html.twig', array(
            'tipoParametro' => $tipoParametro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoParametro entity.
     *
     * @Route("/{id}/edit", name="tipoparametro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoParametro $tipoParametro)
    {
        $deleteForm = $this->createDeleteForm($tipoParametro);
        $editForm = $this->createForm('AppBundle\Form\TipoParametroType', $tipoParametro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipoparametro_edit', array('id' => $tipoParametro->getId()));
        }

        return $this->render('tipoparametro/edit.html.twig', array(
            'tipoParametro' => $tipoParametro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoParametro entity.
     *
     * @Route("/{id}", name="tipoparametro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoParametro $tipoParametro)
    {
        $form = $this->createDeleteForm($tipoParametro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoParametro);
            $em->flush($tipoParametro);
        }

        return $this->redirectToRoute('tipoparametro_index');
    }

    /**
     * Creates a form to delete a tipoParametro entity.
     *
     * @param TipoParametro $tipoParametro The tipoParametro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoParametro $tipoParametro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoparametro_delete', array('id' => $tipoParametro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
