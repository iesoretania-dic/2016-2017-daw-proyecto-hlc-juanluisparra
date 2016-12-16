<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * materiale
 *
 * @ORM\Table(name="materiale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\materialeRepository")
 */
class materiale
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
     * @var local
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="local",inversedBy="materiales")
     */

    private $locales;

    /**
     * @var proveedor
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="proveedor",inversedBy="materialel")
     */
    private $proveedores;

    /**
     * @var estado
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="estado",inversedBy="estadom")
     */
    private $estados;
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var int
     *
     * @ORM\Column(name="numserie", type="integer")
     */
    private $numserie;

    /**
     * @var int
     *
     * @ORM\Column(name="unidades", type="integer")
     */
    private $unidades;

    /**
     * @var string
     *
     * @ORM\Column(name="proveedore", type="string", length=255)
     */
    private $proveedore;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;


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
     * Set marca
     *
     * @param string $marca
     *
     * @return materiale
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return materiale
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set numserie
     *
     * @param integer $numserie
     *
     * @return materiale
     */
    public function setNumserie($numserie)
    {
        $this->numserie = $numserie;

        return $this;
    }

    /**
     * Get numserie
     *
     * @return int
     */
    public function getNumserie()
    {
        return $this->numserie;
    }

    /**
     * Set unidades
     *
     * @param integer $unidades
     *
     * @return materiale
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * Get unidades
     *
     * @return int
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set proveedore
     *
     * @param string $proveedore
     *
     * @return materiale
     */
    public function setProveedore($proveedore)
    {
        $this->proveedore = $proveedore;

        return $this;
    }

    /**
     * Get proveedore
     *
     * @return string
     */
    public function getProveedore()
    {
        return $this->proveedore;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return materiale
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }
}

