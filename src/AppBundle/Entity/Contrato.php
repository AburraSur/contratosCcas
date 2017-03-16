<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Contrato
 *
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratoRepository")
 */
class Contrato
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
     * @var string
     *
     * @ORM\Column(name="conInformacion", type="string", length=4)
     */
    private $conInformacion;

    /**
     * @var string
     *
     * @ORM\Column(name="justificacion", type="string", length=200)
     */
    private $justificacion;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="claseContrato", referencedColumnName="id")
     */
    private $claseContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numConvenio", type="string", length=50)
     */
    private $numConvenio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSuscripcion", type="date")
     */
    private $fechaSuscripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="vecesRegistrado", referencedColumnName="id")
     */
    private $vecesRegistrado;

    /**
     * @var string
     *
     * @ORM\Column(name="objetoContrato", type="text")
     */
    private $objetoContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="vlrContrato", type="string", length=15)
     */
    private $vlrContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="idEntidad", type="string", length=12)
     */
    private $idEntidad;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="dvEntidad", referencedColumnName="id")
     */
    private $dvEntidad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreEntidad", type="string", length=255)
     */
    private $nombreEntidad;

    /**
     * @var int
     *
     * @ORM\Column(name="plazo", type="integer")
     */
    private $plazo;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="tipoGarantia", referencedColumnName="id")
     */
    private $tipoGarantia;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="riesgosAsegurados", referencedColumnName="id")
     */
    private $riesgosAsegurados;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="tipoSeguimiento", referencedColumnName="id")
     */
    private $tipoSeguimiento;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="tipoIdentificacion", referencedColumnName="id")
     */
    private $tipoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="idInterventor", type="string", length=12)
     */
    private $idInterventor;

    /**
     * @var string
     *
     * @ORM\Column(name="numNitInterventor", type="string", length=12)
     */
    private $numNitInterventor;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="dvInterventor", referencedColumnName="id")
     */
    private $dvInterventor;

    /**
     * @var string
     *
     * @ORM\Column(name="cedulaExtranjeria", type="string", length=12)
     */
    private $cedulaExtranjeria;

    /**
     * @var string
     *
     * @ORM\Column(name="nomINterventor", type="string", length=120)
     */
    private $nomINterventor;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="tipoIdSupervisor", referencedColumnName="id")
     */
    private $tipoIdSupervisor;

    /**
     * @var string
     *
     * @ORM\Column(name="IdentSupervisor", type="string", length=12)
     */
    private $identSupervisor;

    /**
     * @var string
     *
     * @ORM\Column(name="nitSupervisor", type="string", length=12)
     */
    private $nitSupervisor;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="dvSupervisor", referencedColumnName="id")
     */
    private $dvSupervisor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreSupervisor", type="string", length=120)
     */
    private $nombreSupervisor;

    /**
     * @var string
     *
     * @ORM\Column(name="plazoConvenio", type="string", length=4)
     */
    private $plazoConvenio;

    /**
     * @ORM\ManyToOne(targetEntity="Parametros", inversedBy="contrato")
     * @ORM\JoinColumn(name="adiciones", referencedColumnName="id")
     */
    private $adiciones;

    /**
     * @var string
     *
     * @ORM\Column(name="vlrTotalAdiciones", type="string", length=15)
     */
    private $vlrTotalAdiciones;

    /**
     * @var string
     *
     * @ORM\Column(name="numDiasAdiciones", type="string", length=4)
     */
    private $numDiasAdiciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicioConvenio", type="date")
     */
    private $fechaInicioConvenio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFinConvenio", type="date")
     */
    private $fechaFinConvenio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaLiquidacion", type="date")
     */
    private $fechaLiquidacion;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentavanceFisicoprogra", type="string", length=4)
     */
    private $porcentavanceFisicoprogra;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentavanceFisicoreal", type="string", length=4)
     */
    private $porcentavanceFisicoreal;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentavancePresuprogram", type="string", length=4)
     */
    private $porcentavancePresuprogram;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentavancePresupreal", type="string", length=4)
     */
    private $porcentavancePresupreal;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Notificaciones", mappedBy="contrato")
     */
    private $notificacion;
    
    /**
     * @ORM\OneToMany(targetEntity="Archivos", mappedBy="contrato")
     */
    private $archivo;
    
    public function __construct()
    {
        $this->notificacion = new ArrayCollection();
        $this->archivo = new ArrayCollection();
    }
    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set conInformacion
     *
     * @param string $conInformacion
     *
     * @return Contrato
     */
    public function setConInformacion($conInformacion)
    {
        $this->conInformacion = $conInformacion;

        return $this;
    }

    /**
     * Get conInformacion
     *
     * @return string
     */
    public function getConInformacion()
    {
        return $this->conInformacion;
    }

    /**
     * Set justificacion
     *
     * @param string $justificacion
     *
     * @return Contrato
     */
    public function setJustificacion($justificacion)
    {
        $this->justificacion = $justificacion;

        return $this;
    }

    /**
     * Get justificacion
     *
     * @return string
     */
    public function getJustificacion()
    {
        return $this->justificacion;
    }

    /**
     * Set claseContrato
     *
     * @param integer $claseContrato
     *
     * @return Contrato
     */
    public function setClaseContrato($claseContrato)
    {
        $this->claseContrato = $claseContrato;

        return $this;
    }

    /**
     * Get claseContrato
     *
     * @return int
     */
    public function getClaseContrato()
    {
        return $this->claseContrato;
    }

    /**
     * Set numConvenio
     *
     * @param string $numConvenio
     *
     * @return Contrato
     */
    public function setNumConvenio($numConvenio)
    {
        $this->numConvenio = $numConvenio;

        return $this;
    }

    /**
     * Get numConvenio
     *
     * @return string
     */
    public function getNumConvenio()
    {
        return $this->numConvenio;
    }

    /**
     * Set fechaSuscripcion
     *
     * @param \DateTime $fechaSuscripcion
     *
     * @return Contrato
     */
    public function setFechaSuscripcion($fechaSuscripcion)
    {
        $this->fechaSuscripcion = $fechaSuscripcion;

        return $this;
    }

    /**
     * Get fechaSuscripcion
     *
     * @return \DateTime
     */
    public function getFechaSuscripcion()
    {
        return $this->fechaSuscripcion;
    }

    /**
     * Set vecesRegistrado
     *
     * @param integer $vecesRegistrado
     *
     * @return Contrato
     */
    public function setVecesRegistrado($vecesRegistrado)
    {
        $this->vecesRegistrado = $vecesRegistrado;

        return $this;
    }

    /**
     * Get vecesRegistrado
     *
     * @return int
     */
    public function getVecesRegistrado()
    {
        return $this->vecesRegistrado;
    }

    /**
     * Set objetoContrato
     *
     * @param string $objetoContrato
     *
     * @return Contrato
     */
    public function setObjetoContrato($objetoContrato)
    {
        $this->objetoContrato = $objetoContrato;

        return $this;
    }

    /**
     * Get objetoContrato
     *
     * @return string
     */
    public function getObjetoContrato()
    {
        return $this->objetoContrato;
    }

    /**
     * Set vlrContrato
     *
     * @param string $vlrContrato
     *
     * @return Contrato
     */
    public function setVlrContrato($vlrContrato)
    {
        $this->vlrContrato = $vlrContrato;

        return $this;
    }

    /**
     * Get vlrContrato
     *
     * @return string
     */
    public function getVlrContrato()
    {
        return $this->vlrContrato;
    }

    /**
     * Set idEntidad
     *
     * @param string $idEntidad
     *
     * @return Contrato
     */
    public function setIdEntidad($idEntidad)
    {
        $this->idEntidad = $idEntidad;

        return $this;
    }

    /**
     * Get idEntidad
     *
     * @return string
     */
    public function getIdEntidad()
    {
        return $this->idEntidad;
    }

    /**
     * Set dvEntidad
     *
     * @param integer $dvEntidad
     *
     * @return Contrato
     */
    public function setDvEntidad($dvEntidad)
    {
        $this->dvEntidad = $dvEntidad;

        return $this;
    }

    /**
     * Get dvEntidad
     *
     * @return int
     */
    public function getDvEntidad()
    {
        return $this->dvEntidad;
    }

    /**
     * Set nombreEntidad
     *
     * @param string $nombreEntidad
     *
     * @return Contrato
     */
    public function setNombreEntidad($nombreEntidad)
    {
        $this->nombreEntidad = $nombreEntidad;

        return $this;
    }

    /**
     * Get nombreEntidad
     *
     * @return string
     */
    public function getNombreEntidad()
    {
        return $this->nombreEntidad;
    }

    /**
     * Set plazo
     *
     * @param integer $plazo
     *
     * @return Contrato
     */
    public function setPlazo($plazo)
    {
        $this->plazo = $plazo;

        return $this;
    }

    /**
     * Get plazo
     *
     * @return int
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * Set tipoGarantia
     *
     * @param integer $tipoGarantia
     *
     * @return Contrato
     */
    public function setTipoGarantia($tipoGarantia)
    {
        $this->tipoGarantia = $tipoGarantia;

        return $this;
    }

    /**
     * Get tipoGarantia
     *
     * @return int
     */
    public function getTipoGarantia()
    {
        return $this->tipoGarantia;
    }

    /**
     * Set riesgosAsegurados
     *
     * @param integer $riesgosAsegurados
     *
     * @return Contrato
     */
    public function setRiesgosAsegurados($riesgosAsegurados)
    {
        $this->riesgosAsegurados = $riesgosAsegurados;

        return $this;
    }

    /**
     * Get riesgosAsegurados
     *
     * @return int
     */
    public function getRiesgosAsegurados()
    {
        return $this->riesgosAsegurados;
    }

    /**
     * Set tipoSeguimiento
     *
     * @param integer $tipoSeguimiento
     *
     * @return Contrato
     */
    public function setTipoSeguimiento($tipoSeguimiento)
    {
        $this->tipoSeguimiento = $tipoSeguimiento;

        return $this;
    }

    /**
     * Get tipoSeguimiento
     *
     * @return int
     */
    public function getTipoSeguimiento()
    {
        return $this->tipoSeguimiento;
    }

    /**
     * Set tipoIdentificacion
     *
     * @param integer $tipoIdentificacion
     *
     * @return Contrato
     */
    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;

        return $this;
    }

    /**
     * Get tipoIdentificacion
     *
     * @return int
     */
    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    /**
     * Set idInterventor
     *
     * @param string $idInterventor
     *
     * @return Contrato
     */
    public function setIdInterventor($idInterventor)
    {
        $this->idInterventor = $idInterventor;

        return $this;
    }

    /**
     * Get idInterventor
     *
     * @return string
     */
    public function getIdInterventor()
    {
        return $this->idInterventor;
    }

    /**
     * Set numNitInterventor
     *
     * @param string $numNitInterventor
     *
     * @return Contrato
     */
    public function setNumNitInterventor($numNitInterventor)
    {
        $this->numNitInterventor = $numNitInterventor;

        return $this;
    }

    /**
     * Get numNitInterventor
     *
     * @return string
     */
    public function getNumNitInterventor()
    {
        return $this->numNitInterventor;
    }

    /**
     * Set dvInterventor
     *
     * @param integer $dvInterventor
     *
     * @return Contrato
     */
    public function setDvInterventor($dvInterventor)
    {
        $this->dvInterventor = $dvInterventor;

        return $this;
    }

    /**
     * Get dvInterventor
     *
     * @return int
     */
    public function getDvInterventor()
    {
        return $this->dvInterventor;
    }

    /**
     * Set cedulaExtranjeria
     *
     * @param string $cedulaExtranjeria
     *
     * @return Contrato
     */
    public function setCedulaExtranjeria($cedulaExtranjeria)
    {
        $this->cedulaExtranjeria = $cedulaExtranjeria;

        return $this;
    }

    /**
     * Get cedulaExtranjeria
     *
     * @return string
     */
    public function getCedulaExtranjeria()
    {
        return $this->cedulaExtranjeria;
    }

    /**
     * Set nomINterventor
     *
     * @param string $nomINterventor
     *
     * @return Contrato
     */
    public function setNomINterventor($nomINterventor)
    {
        $this->nomINterventor = $nomINterventor;

        return $this;
    }

    /**
     * Get nomINterventor
     *
     * @return string
     */
    public function getNomINterventor()
    {
        return $this->nomINterventor;
    }

    /**
     * Set tipoIdSupervisor
     *
     * @param integer $tipoIdSupervisor
     *
     * @return Contrato
     */
    public function setTipoIdSupervisor($tipoIdSupervisor)
    {
        $this->tipoIdSupervisor = $tipoIdSupervisor;

        return $this;
    }

    /**
     * Get tipoIdSupervisor
     *
     * @return int
     */
    public function getTipoIdSupervisor()
    {
        return $this->tipoIdSupervisor;
    }

    /**
     * Set identSupervisor
     *
     * @param string $identSupervisor
     *
     * @return Contrato
     */
    public function setIdentSupervisor($identSupervisor)
    {
        $this->identSupervisor = $identSupervisor;

        return $this;
    }

    /**
     * Get identSupervisor
     *
     * @return string
     */
    public function getIdentSupervisor()
    {
        return $this->identSupervisor;
    }

    /**
     * Set nitSupervisor
     *
     * @param string $nitSupervisor
     *
     * @return Contrato
     */
    public function setNitSupervisor($nitSupervisor)
    {
        $this->nitSupervisor = $nitSupervisor;

        return $this;
    }

    /**
     * Get nitSupervisor
     *
     * @return string
     */
    public function getNitSupervisor()
    {
        return $this->nitSupervisor;
    }

    /**
     * Set dvSupervisor
     *
     * @param integer $dvSupervisor
     *
     * @return Contrato
     */
    public function setDvSupervisor($dvSupervisor)
    {
        $this->dvSupervisor = $dvSupervisor;

        return $this;
    }

    /**
     * Get dvSupervisor
     *
     * @return int
     */
    public function getDvSupervisor()
    {
        return $this->dvSupervisor;
    }

    /**
     * Set nombreSupervisor
     *
     * @param string $nombreSupervisor
     *
     * @return Contrato
     */
    public function setNombreSupervisor($nombreSupervisor)
    {
        $this->nombreSupervisor = $nombreSupervisor;

        return $this;
    }

    /**
     * Get nombreSupervisor
     *
     * @return string
     */
    public function getNombreSupervisor()
    {
        return $this->nombreSupervisor;
    }

    /**
     * Set plazoConvenio
     *
     * @param string $plazoConvenio
     *
     * @return Contrato
     */
    public function setPlazoConvenio($plazoConvenio)
    {
        $this->plazoConvenio = $plazoConvenio;

        return $this;
    }

    /**
     * Get plazoConvenio
     *
     * @return string
     */
    public function getPlazoConvenio()
    {
        return $this->plazoConvenio;
    }

    /**
     * Set adiciones
     *
     * @param integer $adiciones
     *
     * @return Contrato
     */
    public function setAdiciones($adiciones)
    {
        $this->adiciones = $adiciones;

        return $this;
    }

    /**
     * Get adiciones
     *
     * @return int
     */
    public function getAdiciones()
    {
        return $this->adiciones;
    }

    /**
     * Set vlrTotalAdiciones
     *
     * @param string $vlrTotalAdiciones
     *
     * @return Contrato
     */
    public function setVlrTotalAdiciones($vlrTotalAdiciones)
    {
        $this->vlrTotalAdiciones = $vlrTotalAdiciones;

        return $this;
    }

    /**
     * Get vlrTotalAdiciones
     *
     * @return string
     */
    public function getVlrTotalAdiciones()
    {
        return $this->vlrTotalAdiciones;
    }

    /**
     * Set numDiasAdiciones
     *
     * @param string $numDiasAdiciones
     *
     * @return Contrato
     */
    public function setNumDiasAdiciones($numDiasAdiciones)
    {
        $this->numDiasAdiciones = $numDiasAdiciones;

        return $this;
    }

    /**
     * Get numDiasAdiciones
     *
     * @return string
     */
    public function getNumDiasAdiciones()
    {
        return $this->numDiasAdiciones;
    }

    /**
     * Set fechaInicioConvenio
     *
     * @param \DateTime $fechaInicioConvenio
     *
     * @return Contrato
     */
    public function setFechaInicioConvenio($fechaInicioConvenio)
    {
        $this->fechaInicioConvenio = $fechaInicioConvenio;

        return $this;
    }

    /**
     * Get fechaInicioConvenio
     *
     * @return \DateTime
     */
    public function getFechaInicioConvenio()
    {
        return $this->fechaInicioConvenio;
    }

    /**
     * Set fechaFinConvenio
     *
     * @param \DateTime $fechaFinConvenio
     *
     * @return Contrato
     */
    public function setFechaFinConvenio($fechaFinConvenio)
    {
        $this->fechaFinConvenio = $fechaFinConvenio;

        return $this;
    }

    /**
     * Get fechaFinConvenio
     *
     * @return \DateTime
     */
    public function getFechaFinConvenio()
    {
        return $this->fechaFinConvenio;
    }

    /**
     * Set fechaLiquidacion
     *
     * @param \DateTime $fechaLiquidacion
     *
     * @return Contrato
     */
    public function setFechaLiquidacion($fechaLiquidacion)
    {
        $this->fechaLiquidacion = $fechaLiquidacion;

        return $this;
    }

    /**
     * Get fechaLiquidacion
     *
     * @return \DateTime
     */
    public function getFechaLiquidacion()
    {
        return $this->fechaLiquidacion;
    }

    /**
     * Set porcentavanceFisicoprogra
     *
     * @param string $porcentavanceFisicoprogra
     *
     * @return Contrato
     */
    public function setPorcentavanceFisicoprogra($porcentavanceFisicoprogra)
    {
        $this->porcentavanceFisicoprogra = $porcentavanceFisicoprogra;

        return $this;
    }

    /**
     * Get porcentavanceFisicoprogra
     *
     * @return string
     */
    public function getPorcentavanceFisicoprogra()
    {
        return $this->porcentavanceFisicoprogra;
    }

    /**
     * Set porcentavanceFisicoreal
     *
     * @param string $porcentavanceFisicoreal
     *
     * @return Contrato
     */
    public function setPorcentavanceFisicoreal($porcentavanceFisicoreal)
    {
        $this->porcentavanceFisicoreal = $porcentavanceFisicoreal;

        return $this;
    }

    /**
     * Get porcentavanceFisicoreal
     *
     * @return string
     */
    public function getPorcentavanceFisicoreal()
    {
        return $this->porcentavanceFisicoreal;
    }

    /**
     * Set porcentavancePresuprogram
     *
     * @param string $porcentavancePresuprogram
     *
     * @return Contrato
     */
    public function setPorcentavancePresuprogram($porcentavancePresuprogram)
    {
        $this->porcentavancePresuprogram = $porcentavancePresuprogram;

        return $this;
    }

    /**
     * Get porcentavancePresuprogram
     *
     * @return string
     */
    public function getPorcentavancePresuprogram()
    {
        return $this->porcentavancePresuprogram;
    }

    /**
     * Set porcentavancePresupreal
     *
     * @param string $porcentavancePresupreal
     *
     * @return Contrato
     */
    public function setPorcentavancePresupreal($porcentavancePresupreal)
    {
        $this->porcentavancePresupreal = $porcentavancePresupreal;

        return $this;
    }

    /**
     * Get porcentavancePresupreal
     *
     * @return string
     */
    public function getPorcentavancePresupreal()
    {
        return $this->porcentavancePresupreal;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Contrato
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Add notificacion
     *
     * @param \AppBundle\Entity\Notificaciones $notificacion
     *
     * @return Contrato
     */
    public function addNotificacion(\AppBundle\Entity\Notificaciones $notificacion)
    {
        $this->notificacion[] = $notificacion;

        return $this;
    }

    /**
     * Remove notificacion
     *
     * @param \AppBundle\Entity\Notificaciones $notificacion
     */
    public function removeNotificacion(\AppBundle\Entity\Notificaciones $notificacion)
    {
        $this->notificacion->removeElement($notificacion);
    }

    /**
     * Get notificacion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotificacion()
    {
        return $this->notificacion;
    }

    /**
     * Add archivo
     *
     * @param \AppBundle\Entity\Archivos $archivo
     *
     * @return Contrato
     */
    public function addArchivo(\AppBundle\Entity\Archivos $archivo)
    {
        $this->archivo[] = $archivo;

        return $this;
    }

    /**
     * Remove archivo
     *
     * @param \AppBundle\Entity\Archivos $archivo
     */
    public function removeArchivo(\AppBundle\Entity\Archivos $archivo)
    {
        $this->archivo->removeElement($archivo);
    }

    /**
     * Get archivo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchivo()
    {
        return $this->archivo;
    }
}
