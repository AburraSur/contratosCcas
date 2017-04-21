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

    
}
