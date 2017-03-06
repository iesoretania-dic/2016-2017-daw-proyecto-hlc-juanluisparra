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
     * @ORM\ManyToMany(targetEntity="usuario",inversedBy="reslocal")
     */
    private $resusuario;

    /**
     * @var material[]
     *
     * @ORM\OneToMany(targetEntity="material",mappedBy="locales")
     */
    private $materiales;
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
    public function  __toString()
    {
        return $this->getNombre();
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resusuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add resusuario
     *
     * @param \AppBundle\Entity\usuario $resusuario
     *
     * @return local
     */
    public function addResusuario(\AppBundle\Entity\usuario $resusuario)
    {
        $this->resusuario[] = $resusuario;

        return $this;
    }

    /**
     * Remove resusuario
     *
     * @param \AppBundle\Entity\usuario $resusuario
     */
    public function removeResusuario(\AppBundle\Entity\usuario $resusuario)
    {
        $this->resusuario->removeElement($resusuario);
    }

    /**
     * Get resusuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResusuario()
    {
        return $this->resusuario;
    }

    /**
     * Add materiale
     *
     * @param \AppBundle\Entity\material $materiale
     *
     * @return local
     */
    public function addMateriale(\AppBundle\Entity\material $materiale)
    {
        $this->materiales[] = $materiale;

        return $this;
    }

    /**
     * Remove materiale
     *
     * @param \AppBundle\Entity\material $materiale
     */
    public function removeMateriale(\AppBundle\Entity\material $materiale)
    {
        $this->materiales->removeElement($materiale);
    }

    /**
     * Get materiales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMateriales()
    {
        return $this->materiales;
    }
}
