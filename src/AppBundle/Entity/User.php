<?php

namespace AppBundle\Entity;
 
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string 
     * 
     * @ORM\Column(name="identificacion", length=64, unique=false)
     */
    
    private $identificacion;

    /**
     * @var string
     * 
     * @ORM\Column(name="digito", length=84, unique=false)
     */
    private $digito;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Set identificacion
     *
     * @param string $indentificacion
     *
     * @return User
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    
    /**
     * Set digito
     *
     * @param string $digito
     *
     * @return User
     */
    public function setDigito($digito)
    {
        $this->digito = $digito;

        return $this;
    }

    /**
     * Get digito
     *
     * @return string
     */
    public function getDigito()
    {
        return $this->digito;
    }
}
