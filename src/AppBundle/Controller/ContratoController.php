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
                    'label' => 'Formulario con información',
                    'expanded' => false,
                    'multiple' => false,
                    'placeholder' => 'Seleccionar',
                    'choices' => array(
                        '1 SI' => '1 SI',
                        '2 NO' => '2 NO'
                    ),
                    'attr' => array('class' => 'form-control selectpicker','id' => 'conInfo')
                ))
                ->add('justificacion',TextareaType::class, array('label' => 'Justificación', 'attr' => array('class' => 'form-control','id' => 'justifica', 'placeholder' => 'Justificación')))
                ->add('claseContrato',EntityType::class, array(
                    'label' => 'Clase de contrato',
                    'placeholder' => 'Seleccionar',
                    'class' => 'AppBundle:Parametros',
                    'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=2');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker ','id' => 'claseCon')
                ))
                ->add('numConvenio',TextType::class, array('label' => 'Número de convenio o contrato', 'attr' => array('class' => 'form-control','id' => 'numConvenio', 'placeholder' => 'Número de convenio o contrato')))
                ->add('fechaSuscripcion', DateType::class, array(
                        'label' => 'Fecha suscripción',
                        'widget' => 'single_text',
                        'html5' => false,
                        'attr' => ['class' => 'datepicker form-control' ],
                    ))
                ->add('vecesRegistrado',EntityType::class, array(
                   'label' => 'Veces reportado en el SIRECI',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=3');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'vecesRep','data-live-search' => 'true')
                ))
                ->add('objetoContrato',TextareaType::class, array('label' => 'Objeto del convenio o contrato', 'attr' => array('class' => 'form-control','id' => 'objetoConv','placeholder'=>'Objeto del convenio o contrato')))
                ->add('vlrContrato',TextType::class, array('label' => 'Valor total del convenio o contrato', 'attr' => array('class' => 'form-control','id' => 'vlrContrato', 'placeholder' => '(En pesos)')))
                ->add('idEntidad',TextType::class, array('label' => 'NIT de la entidad', 'attr' => array('class' => 'form-control','id' => 'vlrContrato', 'placeholder' => '(Sin digito de verificación, puntos o comas)')))
                ->add('dvEntidad',EntityType::class, array(
                   'label' => 'Digito de verificación',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=4');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'digVer','data-live-search' => 'true')
                ))
                ->add('nombreEntidad',TextType::class, array('label' => 'Entidad', 'attr' => array('class' => 'form-control','id' => 'nomEnti', 'placeholder' => 'Nombre completo')))
                ->add('plazo',TextType::class, array('label' => 'Plazo', 'attr' => array('class' => 'form-control','id' => 'plazo', 'placeholder' => 'Días calendario')))
                ->add('tipoGarantia',EntityType::class, array(
                   'label' => 'Tipo de garantía',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=5');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'tipoGaran','data-live-search' => 'true')
                ))
                ->add('riesgosAsegurados',EntityType::class, array(
                   'label' => 'Riesgos asegurados',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=6');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'riesgosAseg','data-live-search' => 'true')
                ))
                ->add('tipoSeguimiento',EntityType::class, array(
                   'label' => 'Tipo de seguimiento',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=7');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'tipoSeg','data-live-search' => 'true')
                ))
                ->add('tipoIdentificacion',EntityType::class, array(
                   'label' => 'Tipo de identificación del interventor',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=8');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'tipoIdInterv','data-live-search' => 'true')
                ))
                ->add('idInterventor',TextType::class, array('label' => 'Identificación', 'attr' => array('class' => 'form-control','id' => 'cedInterve', 'placeholder' => 'Número de cédula o RUT')))
                ->add('numNitInterventor',TextType::class, array('label' => 'NIT interventor', 'attr' => array('class' => 'form-control','id' => 'dvInterven', 'placeholder' => 'Sin digito de verificación, comas o puntos')))
                ->add('dvInterventor',EntityType::class, array(
                   'label' => 'Digito de verificación',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=4');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'digVer','data-live-search' => 'true')
                ))
                ->add('cedulaExtranjeria',TextType::class, array('label' => 'Cédula Extranjería interventor', 'attr' => array('class' => 'form-control','id' => 'cedExtra', 'placeholder' => 'Cédula extranjería')))
                ->add('nomINterventor',TextType::class, array('label' => 'Interventor', 'attr' => array('class' => 'form-control','id' => 'nomInterven', 'placeholder' => 'Nombre completo')))
                ->add('tipoIdSupervisor',EntityType::class, array(
                   'label' => 'Tipo de identificación del supervisor',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=8');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'tipoIdSuperv','data-live-search' => 'true')
                ))
                ->add('identSupervisor',TextType::class, array('label' => 'Identificación', 'attr' => array('class' => 'form-control','id' => 'cedSuperv', 'placeholder' => 'Número de cédula o RUT')))
                ->add('nitSupervisor',TextType::class, array('label' => 'NIT interventor', 'attr' => array('class' => 'form-control','id' => 'dvSuperv', 'placeholder' => 'Sin digito de verificación, comas o puntos')))
                ->add('dvSupervisor',EntityType::class, array(
                   'label' => 'Digito de verificación',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=4');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'digVerSuperv','data-live-search' => 'true')
                ))
                ->add('nombreSupervisor',TextType::class, array('label' => 'Supervisor', 'attr' => array('class' => 'form-control','id' => 'nomSuperv', 'placeholder' => 'Nombre completo')))
                ->add('plazoConvenio',TextType::class, array('label' => 'Plazo del convenio o contrato', 'attr' => array('class' => 'form-control','id' => 'plazoCont', 'placeholder' => 'Días calendario')))
                ->add('adiciones',EntityType::class, array(
                   'label' => 'Adiciones',
                   'placeholder' => 'Seleccionar',
                   'class' => 'AppBundle:Parametros',
                   'query_builder' => function (EntityRepository $er) {
                                            return $er->createQueryBuilder('u')
                                                    ->where('u.tipoParametro=9');
                                        },
                    'choice_label' => 'Descripcion',
                    'attr' => array('class' => 'form-control selectpicker','id' => 'digVerSuperv','data-live-search' => 'true')
                ))
                ->add('vlrTotalAdiciones',TextType::class, array('label' => 'Valor total', 'attr' => array('class' => 'form-control','id' => 'vlrAdiciones', 'placeholder' => 'En pesos')))
                ->add('numDiasAdiciones',TextType::class, array('label' => 'Adiciones: Número de días', 'attr' => array('class' => 'form-control','id' => 'diasAdiciones', 'placeholder' => 'Número de días')))
                ->add('fechaInicioConvenio', DateType::class, array(
                    'label' => 'Fecha inicio del convenio o contrato',
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'datepicker form-control' ],
                ))
                ->add('fechaFinConvenio', DateType::class, array(
                    'label' => 'Fecha terminación del convenio o contrato',
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'datepicker form-control' ],
                ))
                ->add('fechaLiquidacion', DateType::class, array(
                    'label' => 'Fecha liquidación del convenio o contrato',
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'datepicker form-control' ],
                ))
                ->add('porcentavanceFisicoprogra',TextType::class, array('label' => '% Avance físico programado', 'attr' => array('class' => 'form-control','id' => 'porcAvanceprog', 'placeholder' => 'Porcentaje en números')))
                ->add('porcentavanceFisicoreal',TextType::class, array('label' => '%  Avance físico real', 'attr' => array('class' => 'form-control','id' => 'porcAvancereal', 'placeholder' => 'Porcentaje en números')))
                ->add('porcentavancePresuprogram',TextType::class, array('label' => '%  Avance presupuestal programado', 'attr' => array('class' => 'form-control','id' => 'porcAvaPresupProg', 'placeholder' => 'Porcentaje en números')))
                ->add('porcentavancePresupreal',TextType::class, array('label' => '% Avance presupuestal real', 'attr' => array('class' => 'form-control','id' => 'porcAvaPresupReal', 'placeholder' => 'Porcentaje en números')))
                ->add('Observaciones',TextareaType::class, array('label' => 'Observaciones', 'attr' => array('class' => 'form-control','id' => 'Observaciones', 'placeholder' => 'Observaciones')))
                ->add('save', SubmitType::class, array('label' => 'Guardar' , 'attr' => array('class' => 'btn btn-primary pull-right')))
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
   
   /**
     * Finds and displays a contrato entity.
     *
     * @Route("/{id}", name="contrato_show")
     * @Method("GET")
     */
    public function showAction(Contrato $contrato)
    {

        return $this->render('contrato/show.html.twig', array(
            'contrato' => $contrato,
        ));
    }
    
}


