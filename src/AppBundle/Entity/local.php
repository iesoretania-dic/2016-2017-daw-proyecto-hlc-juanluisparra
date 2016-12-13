<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\localRepository")
 */
class local
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
     * @var usuario[]
     *
     * @ORM\ManyToMany(targetEntity="usuario",inversedBy="pertenecelocal")
     */
    private $perteneceusuario;

    /**
     * @var usuario[]
     *
     * @ORM\ManyToMany(targetEntity="usuario",inversedBy="reslocal")
     */
    private $resusuario;
    /**
     * @var int
     *
     * @ORM\Column(name="planta", type="integer")
     */
    private $planta;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
     * Set planta
     *
     * @param integer $planta
     *
     * @return local
     */
    public function setPlanta($planta)
    {
        $this->planta = $planta;

        return $this;
    }

    /**
     * Get planta
     *
     * @return int
     */
    public function getPlanta()
    {
        return $this->planta;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return local
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}

