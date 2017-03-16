<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TipoParametro
 *
 * @ORM\Table(name="tipo_parametro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoParametroRepository")
 */
class TipoParametro
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
     * @ORM\Column(name="parametro", type="string", length=60)
     */
    private $parametro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="current", type="date")
     */
    private $current;
    
    /**
     * @ORM\OneToMany(targetEntity="Parametros", mappedBy="tipoParametros")
     */
    private $tipoParametro;
    
    public function __construct()
    {
        $this->tipoParametro = new ArrayCollection();
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
     * Set parametro
     *
     * @param string $parametro
     *
     * @return TipoParametro
     */
    public function setParametro($parametro)
    {
        $this->parametro = $parametro;

        return $this;
    }

    /**
     * Get parametro
     *
     * @return string
     */
    public function getParametro()
    {
        return $this->parametro;
    }

    /**
     * Set current
     *
     * @param \DateTime $current
     *
     * @return TipoParametro
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
     * Add tipoParametro
     *
     * @param \AppBundle\Entity\Parametros $tipoParametro
     *
     * @return TipoParametro
     */
    public function addTipoParametro(\AppBundle\Entity\Parametros $tipoParametro)
    {
        $this->tipoParametro[] = $tipoParametro;

        return $this;
    }

    /**
     * Remove tipoParametro
     *
     * @param \AppBundle\Entity\Parametros $tipoParametro
     */
    public function removeTipoParametro(\AppBundle\Entity\Parametros $tipoParametro)
    {
        $this->tipoParametro->removeElement($tipoParametro);
    }

    /**
     * Get tipoParametro
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoParametro()
    {
        return $this->tipoParametro;
    }
}
