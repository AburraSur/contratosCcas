<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contrato;
use AppBundle\Entity\Parametros;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TipoParametro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * 
 * Contratos Controller
 * 
 * @Route ("contrato")
 */ 
class ContratoController extends Controller {
    /**
    * 
    * @Route ("/", name="contrato_index")
    * @Method("GET")
    */

   public function indexAction() {
       
       $em = $this->getDoctrine()->getManager();
       
       $contratos = $em->getRepository('AppBundle:Contrato')->findAll();
       
       return $this->render('contrato/contrato.html.twig', array(
           'contratos' => $contratos,
       ));
   } 
   
   /**
    * 
    * Crear nuevos contratos
    * 
    * @Route("/new", name="contrato_new")
    * @Method({"GET", "POST"})
    */
   
   public function CrearContratoAction(Request $request) {
       $em = $this->getDoctrine()->getManager();
       
       $contrato = new Contrato();
       
       $form = $this->createFormBuilder($contrato)
              ->add('conInformacion', ChoiceType::class, array(
                    'expanded' => false,
                    'multiple' => false,

                    'choices' => array(
                        '1 SI' => '1 SI',
                        '2 NO' => '2 NO'
                    ),
                    'attr' => array('class' => 'form-control selectpicker','id' => 'conInfo')
                ))
               ->add('justificacion',TextareaType::class, array('label' => 'Justificación', 'attr' => array('class' => 'form-control','id' => 'justifica', 'placeholder' => 'Justificación')))
               ->add('claseContrato',EntityType::class, array(
                   'label' => 'Clase de contrato',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                                    return $er->createQueryBuilder('u')
                                                            ->where('u.tipoParametro=2');
                                                },
                            'choice_label' => 'Parametros',
                                                        ))
               ->add('save', SubmitType::class, array('label' => 'Guardar' , 'attr' => array('class' => 'btn btn-default')))
               ->getForm();
       
       $form->handleRequest($request);
       
       if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrato);
            $em->flush($contrato);

            return $this->redirectToRoute('contrato_show', array('id' => $contrato->getId()));
        }

        return $this->render('contrato/new.html.twig', array(
            'contrato' => $contrato,
            'form' => $form->createView(),
        ));
   }
    
}


