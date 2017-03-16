<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parametros;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TipoParametro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Parametro controller.
 *
 * @Route("parametros")
 */
class ParametrosController extends Controller
{
    /**
     * Lists all parametro entities.
     *
     * @Route("/", name="parametros_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parametros = $em->getRepository('AppBundle:Parametros')->findAll();

        return $this->render('parametros/index.html.twig', array(
            'parametros' => $parametros,
        ));
    }

    /**
     * Creates a new parametro entity.
     *
     * @Route("/new", name="parametros_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parametro = new Parametros();
//        $form = $this->createForm('AppBundle\Form\ParametrosType', $parametro);
//        $form->handleRequest($request);
        $form = $this->createFormBuilder($parametro)
                ->add('descripcion',TextType::class, array('label' => 'Descripción', 'attr' => array('class' => 'form-control','id' => 'descrip', 'placeholder' => 'Descripción')))
                ->add('tipoParametro',EntityType::class, array('label' => 'Tipo de Parametro', 'attr' => array('class' => 'form-control selectpicker' , 'id' => 'dateCreate' , 'data-style' => 'btn-primary' , 'data-id' => 'dateCreacion' , 'data-live-search' => 'true' ),
                            'class' => 'AppBundle:TipoParametro',
//                            'query_builder' => function (EntityRepository $er) {
//                                                    return $er->createQueryBuilder('u')
//                                                            ->where('u.id=2');
//                                                },
                            'choice_label' => 'Parametro',
                        ))
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
            $em->persist($parametro);
            $em->flush($parametro);

            return $this->redirectToRoute('parametros_show', array('id' => $parametro->getId()));
        }

        return $this->render('parametros/new.html.twig', array(
            'parametro' => $parametro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a parametro entity.
     *
     * @Route("/{id}", name="parametros_show")
     * @Method("GET")
     */
    public function showAction(Parametros $parametro)
    {
        $deleteForm = $this->createDeleteForm($parametro);

        return $this->render('parametros/show.html.twig', array(
            'parametro' => $parametro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parametro entity.
     *
     * @Route("/{id}/edit", name="parametros_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parametros $parametro)
    {
        $deleteForm = $this->createDeleteForm($parametro);
        $editForm = $this->createForm('AppBundle\Form\ParametrosType', $parametro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parametros_edit', array('id' => $parametro->getId()));
        }

        return $this->render('parametros/edit.html.twig', array(
            'parametro' => $parametro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parametro entity.
     *
     * @Route("/{id}", name="parametros_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parametros $parametro)
    {
        $form = $this->createDeleteForm($parametro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parametro);
            $em->flush($parametro);
        }

        return $this->redirectToRoute('parametros_index');
    }

    /**
     * Creates a form to delete a parametro entity.
     *
     * @param Parametros $parametro The parametro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parametros $parametro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parametros_delete', array('id' => $parametro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
