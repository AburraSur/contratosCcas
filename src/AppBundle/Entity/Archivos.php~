<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Archivos
 *
 * @ORM\Table(name="archivos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArchivosRepository")
 */
class Archivos
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
     * @ORM\Column(name="nombreArchivo", type="string", length=60)
     */
    private $nombreArchivo;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="blob")
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="current", type="date")
     */
    private $current;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contrato", inversedBy="notificacion")
     * @ORM\JoinColumn(name="idContrato", referencedColumnName="id")
     */
    private $idContrato;


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
     * Set nombreArchivo
     *
     * @param string $nombreArchivo
     *
     * @return Archivos
     */
    public function setNombreArchivo($nombreArchivo)
    {
        $this->nombreArchivo = $nombreArchivo;

        return $this;
    }

    /**
     * Get nombreArchivo
     *
     * @return string
     */
    public function getNombreArchivo()
    {
        return $this->nombreArchivo;
    }

    /**
     * Set idContrato
     *
     * @param integer $idContrato
     *
     * @return Archivos
     */
    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;

        return $this;
    }

    /**
     * Get idContrato
     *
     * @return int
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return Archivos
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set current
     *
     * @param \DateTime $current
     *
     * @return Archivos
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
