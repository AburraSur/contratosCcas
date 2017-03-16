<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Parametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParametrosRepository")
 */
class Parametros
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="TipoParametro", inversedBy="parametros")
     * @ORM\JoinColumn(name="tipoParametro", referencedColumnName="id")
     */
    private $tipoParametro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="current", type="date")
     */
    private $current;
    
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $claseContrato;
    
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $vecesRegistrado;
    
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $dvEntidad;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $tipoGarantia;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $riesgosAsegurados;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $tipoSeguimiento;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $tipoIdentificacion;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $dvInterventor;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $tipoIdSupervisor;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $dvSupervisor;
	
    /**
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="parametros")
     */
    private $adiciones;
    
    public function __construct()
    {
        $this->claseContrato = new ArrayCollection();
        $this->vecesRegistrado = new ArrayCollection();
        $this->dvEntidad = new ArrayCollection();
        $this->tipoGarantia = new ArrayCollection();
        $this->riesgosAsegurados = new ArrayCollection();
        $this->tipoSeguimiento = new ArrayCollection();
        $this->tipoIdentificacion = new ArrayCollection();
        $this->dvInterventor = new ArrayCollection();
        $this->tipoIdSupervisor = new ArrayCollection();
        $this->dvSupervisor = new ArrayCollection();
        $this->adiciones = new ArrayCollection();
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Parametros
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set tipoParametro
     *
     * @param integer $tipoParametro
     *
     * @return Parametros
     */
    public function setTipoParametro($tipoParametro)
    {
        $this->tipoParametro = $tipoParametro;

        return $this;
    }

    /**
     * Get tipoParametro
     *
     * @return int
     */
    public function getTipoParametro()
    {
        return $this->tipoParametro;
    }

    /**
     * Set current
     *
     * @param \DateTime $current
     *
     * @return Parametros
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get current
     *
     * @return \DateTime
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Add claseContrato
     *
     * @param \AppBundle\Entity\Contrato $claseContrato
     *
     * @return Parametros
     */
    public function addClaseContrato(\AppBundle\Entity\Contrato $claseContrato)
    {
        $this->claseContrato[] = $claseContrato;

        return $this;
    }

    /**
     * Remove claseContrato
     *
     * @param \AppBundle\Entity\Contrato $claseContrato
     */
    public function removeClaseContrato(\AppBundle\Entity\Contrato $claseContrato)
    {
        $this->claseContrato->removeElement($claseContrato);
    }

    /**
     * Get claseContrato
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClaseContrato()
    {
        return $this->claseContrato;
    }

    /**
     * Add vecesRegistrado
     *
     * @param \AppBundle\Entity\Contrato $vecesRegistrado
     *
     * @return Parametros
     */
    public function addVecesRegistrado(\AppBundle\Entity\Contrato $vecesRegistrado)
    {
        $this->vecesRegistrado[] = $vecesRegistrado;

        return $this;
    }

    /**
     * Remove vecesRegistrado
     *
     * @param \AppBundle\Entity\Contrato $vecesRegistrado
     */
    public function removeVecesRegistrado(\AppBundle\Entity\Contrato $vecesRegistrado)
    {
        $this->vecesRegistrado->removeElement($vecesRegistrado);
    }

    /**
     * Get vecesRegistrado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVecesRegistrado()
    {
        return $this->vecesRegistrado;
    }

    /**
     * Add dvEntidad
     *
     * @param \AppBundle\Entity\Contrato $dvEntidad
     *
     * @return Parametros
     */
    public function addDvEntidad(\AppBundle\Entity\Contrato $dvEntidad)
    {
        $this->dvEntidad[] = $dvEntidad;

        return $this;
    }

    /**
     * Remove dvEntidad
     *
     * @param \AppBundle\Entity\Contrato $dvEntidad
     */
    public function removeDvEntidad(\AppBundle\Entity\Contrato $dvEntidad)
    {
        $this->dvEntidad->removeElement($dvEntidad);
    }

    /**
     * Get dvEntidad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDvEntidad()
    {
        return $this->dvEntidad;
    }

    /**
     * Add tipoGarantium
     *
     * @param \AppBundle\Entity\Contrato $tipoGarantium
     *
     * @return Parametros
     */
    public function addTipoGarantium(\AppBundle\Entity\Contrato $tipoGarantium)
    {
        $this->tipoGarantia[] = $tipoGarantium;

        return $this;
    }

    /**
     * Remove tipoGarantium
     *
     * @param \AppBundle\Entity\Contrato $tipoGarantium
     */
    public function removeTipoGarantium(\AppBundle\Entity\Contrato $tipoGarantium)
    {
        $this->tipoGarantia->removeElement($tipoGarantium);
    }

    /**
     * Get tipoGarantia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoGarantia()
    {
        return $this->tipoGarantia;
    }

    /**
     * Add riesgosAsegurado
     *
     * @param \AppBundle\Entity\Contrato $riesgosAsegurado
     *
     * @return Parametros
     */
    public function addRiesgosAsegurado(\AppBundle\Entity\Contrato $riesgosAsegurado)
    {
        $this->riesgosAsegurados[] = $riesgosAsegurado;

        return $this;
    }

    /**
     * Remove riesgosAsegurado
     *
     * @param \AppBundle\Entity\Contrato $riesgosAsegurado
     */
    public function removeRiesgosAsegurado(\AppBundle\Entity\Contrato $riesgosAsegurado)
    {
        $this->riesgosAsegurados->removeElement($riesgosAsegurado);
    }

    /**
     * Get riesgosAsegurados
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRiesgosAsegurados()
    {
        return $this->riesgosAsegurados;
    }

    /**
     * Add tipoSeguimiento
     *
     * @param \AppBundle\Entity\Contrato $tipoSeguimiento
     *
     * @return Parametros
     */
    public function addTipoSeguimiento(\AppBundle\Entity\Contrato $tipoSeguimiento)
    {
        $this->tipoSeguimiento[] = $tipoSeguimiento;

        return $this;
    }

    /**
     * Remove tipoSeguimiento
     *
     * @param \AppBundle\Entity\Contrato $tipoSeguimiento
     */
    public function removeTipoSeguimiento(\AppBundle\Entity\Contrato $tipoSeguimiento)
    {
        $this->tipoSeguimiento->removeElement($tipoSeguimiento);
    }

    /**
     * Get tipoSeguimiento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoSeguimiento()
    {
        return $this->tipoSeguimiento;
    }

    /**
     * Add tipoIdentificacion
     *
     * @param \AppBundle\Entity\Contrato $tipoIdentificacion
     *
     * @return Parametros
     */
    public function addTipoIdentificacion(\AppBundle\Entity\Contrato $tipoIdentificacion)
    {
        $this->tipoIdentificacion[] = $tipoIdentificacion;

        return $this;
    }

    /**
     * Remove tipoIdentificacion
     *
     * @param \AppBundle\Entity\Contrato $tipoIdentificacion
     */
    public function removeTipoIdentificacion(\AppBundle\Entity\Contrato $tipoIdentificacion)
    {
        $this->tipoIdentificacion->removeElement($tipoIdentificacion);
    }

    /**
     * Get tipoIdentificacion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    /**
     * Add dvInterventor
     *
     * @param \AppBundle\Entity\Contrato $dvInterventor
     *
     * @return Parametros
     */
    public function addDvInterventor(\AppBundle\Entity\Contrato $dvInterventor)
    {
        $this->dvInterventor[] = $dvInterventor;

        return $this;
    }

    /**
     * Remove dvInterventor
     *
     * @param \AppBundle\Entity\Contrato $dvInterventor
     */
    public function removeDvInterventor(\AppBundle\Entity\Contrato $dvInterventor)
    {
        $this->dvInterventor->removeElement($dvInterventor);
    }

    /**
     * Get dvInterventor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDvInterventor()
    {
        return $this->dvInterventor;
    }

    /**
     * Add tipoIdSupervisor
     *
     * @param \AppBundle\Entity\Contrato $tipoIdSupervisor
     *
     * @return Parametros
     */
    public function addTipoIdSupervisor(\AppBundle\Entity\Contrato $tipoIdSupervisor)
    {
        $this->tipoIdSupervisor[] = $tipoIdSupervisor;

        return $this;
    }

    /**
     * Remove tipoIdSupervisor
     *
     * @param \AppBundle\Entity\Contrato $tipoIdSupervisor
     */
    public function removeTipoIdSupervisor(\AppBundle\Entity\Contrato $tipoIdSupervisor)
    {
        $this->tipoIdSupervisor->removeElement($tipoIdSupervisor);
    }

    /**
     * Get tipoIdSupervisor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoIdSupervisor()
    {
        return $this->tipoIdSupervisor;
    }

    /**
     * Add dvSupervisor
     *
     * @param \AppBundle\Entity\Contrato $dvSupervisor
     *
     * @return Parametros
     */
    public function addDvSupervisor(\AppBundle\Entity\Contrato $dvSupervisor)
    {
        $this->dvSupervisor[] = $dvSupervisor;

        return $this;
    }

    /**
     * Remove dvSupervisor
     *
     * @param \AppBundle\Entity\Contrato $dvSupervisor
     */
    public function removeDvSupervisor(\AppBundle\Entity\Contrato $dvSupervisor)
    {
        $this->dvSupervisor->removeElement($dvSupervisor);
    }

    /**
     * Get dvSupervisor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDvSupervisor()
    {
        return $this->dvSupervisor;
    }

    /**
     * Add adicione
     *
     * @param \AppBundle\Entity\Contrato $adicione
     *
     * @return Parametros
     */
    public function addAdicione(\AppBundle\Entity\Contrato $adicione)
    {
        $this->adiciones[] = $adicione;

        return $this;
    }

    /**
     * Remove adicione
     *
     * @param \AppBundle\Entity\Contrato $adicione
     */
    public function removeAdicione(\AppBundle\Entity\Contrato $adicione)
    {
        $this->adiciones->removeElement($adicione);
    }

    /**
     * Get adiciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdiciones()
    {
        return $this->adiciones;
    }
}
