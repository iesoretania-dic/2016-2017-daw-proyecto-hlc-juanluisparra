<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * material
 *
 * @ORM\Table(name="material")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\materialRepository")
 */
class material
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="date")
     */
    private $fechaBaja;

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
     * @return material
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
     * @return material
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
     * @return material
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
     * @return material
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
     * @return material
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
     * @return material
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

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return material
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return material
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set locales
     *
     * @param \AppBundle\Entity\local $locales
     *
     * @return material
     */
    public function setLocales(\AppBundle\Entity\local $locales)
    {
        $this->locales = $locales;

        return $this;
    }

    /**
     * Get locales
     *
     * @return \AppBundle\Entity\local
     */
    public function getLocales()
    {
        return $this->locales;
    }

    /**
     * Set proveedores
     *
     * @param \AppBundle\Entity\proveedor $proveedores
     *
     * @return material
     */
    public function setProveedores(\AppBundle\Entity\proveedor $proveedores)
    {
        $this->proveedores = $proveedores;

        return $this;
    }

    /**
     * Get proveedores
     *
     * @return \AppBundle\Entity\proveedor
     */
    public function getProveedores()
    {
        return $this->proveedores;
    }

    /**
     * Set estados
     *
     * @param \AppBundle\Entity\estado $estados
     *
     * @return material
     */
    public function setEstados(\AppBundle\Entity\estado $estados)
    {
        $this->estados = $estados;

        return $this;
    }

    /**
     * Get estados
     *
     * @return \AppBundle\Entity\estado
     */
    public function getEstados()
    {
        return $this->estados;
    }
}
